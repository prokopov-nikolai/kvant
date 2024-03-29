<?php

namespace App\Http\Controllers;

use App\Entity\FormFileEntity;
use App\Entity\FormDbEntity;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class FormController extends Controller
{

    public function save(Request $request, Route $route)
    {
        $formEntityName = 'FormFileEntity';

        $formFields = $request->validate([
            'username' => 'required|string|max:255',
            'phone' => 'required|regex:/\d{10,11}/',
            'message' => 'required|string|max:1000',
        ]);

        switch ($formEntityName) {
            case 'FormFileEntity':
                $formEntity = new FormFileEntity();
                break;
            case 'FormDbEntity':
                $formEntity = new FormDbEntity();
                break;
            default:
                throw new Exception('Undefined type');
        }


        $formEntity->save($formFields);
    }
}
