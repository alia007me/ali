<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Faker\Provider\File;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Exception\PcreException;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\exactly;


class PersonController extends Controller
{
    function index()
    {
        $contacts = Person::all();
        return view('Person.index', compact('contacts'));
    }

    function add()
    {
        return view('Person.add');
    }

    function create(Request $req)
    {
        try {
            $req->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
            ]);

            $avatarName = "";
            if ($req->avatar) {
                $avatarName = time() . '.' . $req->avatar->extension();
                $req->avatar->move(public_path('people_avatar'), $avatarName);
            }
            Person::create([
                'name' => $req['name'],
                'family' => $req['family'],
                'phone_number' => $req['phone_number'],
                'email' => $req['email'],
                'avatar' => $avatarName
            ]);

            return redirect('/')->with('success', 'Contact saved!');
        } catch (Exception $ex) {
            return redirect('/')->with('failed', 'Can not save contact. There are some error!');
        }
    }

    function delete($id)
    {
        try {
            $result = false;
            $name = "";
            if (Person::find($id)) {
                $name = Person::find($id)['name'] . " " . Person::find($id)['family'];
                $result = Person::find($id)->delete();
            } else
                return redirect('/')->with('failed', 'Can not delete contact. There are some error!');

            if ($result)
                return redirect('/')->with('success', 'Contact "' . $name . '" deleted!');
            else
                return redirect('/')->with('failed', 'Can not delete contact. There are some error!');
        } catch (Exception $ex) {
            return redirect('/')->with('failed', 'Can not delete contact. There are some error!');
        }

    }

    function edit($id)
    {
        $contact = Person::find($id);
        return view('Person.edit', compact('contact'));
    }

    function update(Request $req, $id)
    {
        try {
            $avatarName = Person::find($id)['avatar'];
            if ($req->avatar)
                if ($avatarName != "") {
                    \File::delete(public_path('people_avatar') . "\\" . $avatarName);
                    $avatarName = time() . '.' . $req->avatar->extension();
                    $req->avatar->move(public_path('people_avatar'), $avatarName);
                } else {
                    $avatarName = time() . '.' . $req->avatar->extension();
                    $req->avatar->move(public_path('people_avatar'), $avatarName);
                }

            Person::find($id)->update([
                'name' => $req['name'],
                'family' => $req['family'],
                'phone_number' => $req['phone_number'],
                'email' => $req['email'],
                'avatar' => $avatarName
            ]);

            return redirect('/')->with('success', 'Contact "' . $req->name . " " . $req->family . " updated!");
        } catch (Exception $ex) {
            return redirect(' / ')->with('failed', 'Can not update contact . There are some error!');
        }
    }
}
