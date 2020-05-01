<?php


namespace App\Http\Controllers;

use App\Http\Controllers\BadUsersController;
use App\BadUsers;
use Illuminate\Http\Request;
use App\User;
use App\CategoryMeta;

class AdminController extends Controller
{
    public function __construct()
    {
        $badUsers = new BadUsersController();
        $badUser = $_SERVER['REMOTE_ADDR'];
        if (!empty($badUsers->check($badUser))) {
            echo "<script>
                location.href='https://google.com';
            </script>";
            exit();
        }
    }

    public function admin(Request $request)
    {
        $request->session()->forget('errorAuth');

        return view('admin');
    }

    public function auth(Request $request)
    {

        $request->session()->forget('errorAuth');

        $method = $request->post();
        $login = $method['email'];
        $password = $method['password'];

        $passwordDataPart1 = substr($password, 0, 4);
        $passwordDataPart2 = substr($password, 5, strlen($password));

        $userID = User::where('email', $login)->first();

        if (empty($userID)) {
            session(['errorAuth' => 'email']);
            return redirect('http://localhost/laravel/blog/public/admin');
        } else {
            $middlePart = CategoryMeta::where('metaId', $userID->id)->first();

            $resultPassword = hash('sha256', md5($passwordDataPart1 . $middlePart->description) . hash('sha256', $passwordDataPart2));

            $flight = User::where('email', $login)->where('password', $resultPassword)->first();
            if ($flight == NULL) {
                session(['errorAuth' => 'password']);
                return redirect('http://localhost/laravel/blog/public/admin');
            } else {
                $email = $flight->email;
                //   $value = session('key', 'default');

                // Store a piece of data in the session...
                session(['email' => $email]);
                return redirect('http://localhost/laravel/blog/public/adminPage');
            }
        }
    }

    public function adminPage(Request $request)
    {
        $request->session()->forget('errorAuth');
        $request->session()->forget('errorRegister');
        $data = ['email' => session('email')];

        return view('adminPage', $data);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('email');

        return redirect('http://localhost/laravel/blog/public/admin');
    }

    public function editUser($id)
    {
        $user = User::where('id', $id)->first();
        $name = $user->name;
        $email = $user->email;

        $data = ['name' => $name, 'email' => $email, 'id' => $id];

        return view('editUser', $data);
    }

    public function editUsers()
    {
        $users = User::all();

        $data = ['users' => $users];

        return view('editUsers', $data);
    }

    public function removeUsers()
    {
        $users = User::all();

        $data = ['users' => $users];

        return view('removeUsers', $data);
    }

    public function updateUser(Request $request)
    {
        $method = $request->post();

        USER::where('id', $method['id'])
            ->update(['name' => $method['name'],
                'email' => $method['email']
            ]);

        return redirect('http://localhost/laravel/blog/public/adminPage');
    }

    public function removeUser($id)
    {
        USER::destroy($id);

        return redirect('http://localhost/laravel/blog/public/adminPage');
    }

    public function insertUserForm(Request $request)
    {
        $method = $request->post();

        $newUser = new User();

        $newUser->name = $method['name'];
        $newUser->email = $method['email'];
        $newUser->password = $method['password'];
        $newUser->updated_at = '2020-04-21 05:34:44';
        $newUser->created_at = '2020-04-21 05:34:44';

        $newUser->save();

        return redirect('http://localhost/laravel/blog/public/adminPage');
    }

    public function insertUser()
    {
        return view('insertUser');

    }

    public function registerNew(Request $request)
    {

        return view('register');

    }

    public function registerUser(Request $request)
    {
        $request->session()->forget('errorRegister');

        $method = $request->post();
        $testArr = [$method['name'], $method['email'], $method['password']];

        foreach ($testArr as $field) {

            $checkName = $this->checkField(strtolower($field));

            if ($checkName == 1) {
                $page = $_SERVER['HTTP_REFERER'];
                $badUser = $_SERVER['REMOTE_ADDR'];
                $this->addBadUser($page, $badUser);
                return redirect('https://www.google.com/');

            }
        }

        if ( strlen($method['password']) < 8) {
            session(['errorRegister' => 2]);
            return redirect('http://localhost/laravel/blog/public/registerNew');
        } else {
            $newUser = new User();
            $newHash = new CategoryMeta();

            $userID = User::where('email', $method['email'])->first();
            if (!empty($userID)) {
                session(['errorRegister' => 1]);
                return redirect('http://localhost/laravel/blog/public/registerNew');
            }

            $newUser->name = $method['name'];
            $newUser->email = $method['email'];

            $passwordData = $method['password'];
            $passwordDataPart1 = substr($passwordData, 0, 4);
            $passwordDataPart2 = substr($passwordData, 5, strlen($passwordData));

            $middlePart = uniqid();

            $newUser->password = hash('sha256', md5($passwordDataPart1 . $middlePart) . hash('sha256', $passwordDataPart2));

            $newUser->updated_at = '2020-04-21 05:34:44';
            $newUser->created_at = '2020-04-21 05:34:44';

            $newUser->save();

            $newHash->metaId = $newUser->id;
            $newHash->description = $middlePart;
            $newHash->updated_at = '2020-04-21 05:34:44';
            $newHash->created_at = '2020-04-21 05:34:44';
            $newHash->save();

            return redirect('http://localhost/laravel/blog/public/adminPage');
        }
    }

    public function checkField($string)
    {
        $findWords = ['select', 'drop', 'insert', 'update', 'delete'];

        foreach ($findWords as $findWord)
        {
            if(strripos ($string, $findWord) !== false){

                return 1;
            }
        }

        return 0;
    }

    public function addBadUser($page, $ip) {

        $badUser = new BadUsers();
        $badUser->userIP = $ip;
        $badUser->page = $page;
        $badUser->updated_at = '2020-04-21 05:34:44';
        $badUser->save();

    }

}
