<?php

namespace App\Http\Controllers;

use App\Cashback_history;
use App\Client;
use App\Employee;
use App\Partner;
use App\Percent;
use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminController extends Controller
{

    public function admin()
    {
        return view('admin');
    }

    public function client_registration(Request $request)
    {
        $this->validate($request, [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'phone' => 'required|string|max:11|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        $user = User::create([
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id' => User::CLIENT_ROLE,
        ]);
        $client = Client::create([
            'user_id' => $user['id'],
            'last_name' => $request['last_name'],
            'first_name' => $request['first_name'],
            'card_number' => (new \App\Client)->card_number()
        ]);
        Cashback_history::create([
            'client_id' => $client['id'],
            'shop_id' => '1',
            'percent_id' => '1',
            'sum' => '0',
            'cashback' => '0',
        ]);
        return redirect('/admin');
    }

    public function partner_registration(Request $request)
    {
        $partner = Partner::create([
            'name' => $request['name'],
            'full_name' => $request['full_name'],
            'inn' => $request['inn'],
            'kpp' => $request['kpp'],
            'ogrn' => $request['ogrn'],
            'rc' => $request['rc'],
            'bank_name' => $request['bank_name'],
            'bik' => $request['bik'],
            'ks' => $request['ks'],
        ]);
        Percent::create([
            'partner_id' => $partner['id'],
            'percent' => $request['percent']
        ]);

        return redirect('/admin');
    }

    public function shop_registration(Request $request)
    {
        Shop::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'partner_id' => $request['partner'],
        ]);
        return redirect('/admin');
    }

    public function employee_registration(Request $request)
    {
        $user = User::create([
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id' => User::EMPLOYEE_ROLE,
        ]);
        Employee::create([
            'user_id' => $user['id'],
            'shop_id' => $request['shop'],
            'last_name' => $request['last_name'],
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
        ]);
        return redirect('/admin');
    }

    public function partners_list()
    {
        $partners = Partner::with('percent')->get();
        return View::make('admin.list_of_partners', compact('partners', $partners));
    }

    public function clients_list()
    {
        $clients = Client::with('cashback_history', 'user')->get();
        return View::make('admin.list_of_clients', compact('clients', $clients));
    }

    public function shops_list()
    {
        $shops = Shop::with('partner')->get();
        return View::make('admin.list_of_shops', compact('shops', $shops));
    }

    public function employees_list()
    {
        $employees = Employee::with('shop')->get();
        return View::make('admin.list_of_employees', compact('employees', $employees));
    }

    public function change_value_percent(Request $request)
    {
        Percent::create([
            'percent' => $request['percent'],
            'partner_id' => $request['partner_id'],
        ]);
        return redirect('/admin');
    }

    public function report(Request $request)
    {
        $histories = Cashback_history::with('shop')->get()->where('shop.partner_id', $request['partner_id']);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $i = 3;
        $sheet->setCellValue('C2', "Сумма");
        $sheet->setCellValue('D2', "Кэшбэк");
        $sheet->setCellValue('E2', "Дата");
        foreach ($histories as $history) {
            $sheet->setCellValue("C$i", "$history[sum]");
            $sheet->setCellValue("D$i", "$history[cashback]");
            $sheet->setCellValue("E$i", "$history[created_at]");
            $i++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('report.xlsx');
        $path = "../public/report.xlsx";
        return response()->file($path);
    }

    public function client_remove(Request $request)
    {
        Client::destroy("$request[id]");
        return redirect('/admin/list_of_clients');
    }

    public function partner_remove(Request $request)
    {
        Partner::destroy("$request[id]");
        return redirect('/admin/list_of_partners');
    }

    public function shop_remove(Request $request)
    {
        return Shop::destroy("$request[id]");
    }

    public function employee_remove(Request $request)
    {
        return Employee::destroy("$request[id]");
    }

}
