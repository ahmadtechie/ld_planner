<?php

namespace App\Controllers\OrgStructure;

use App\Controllers\BaseController;
use App\Models\DivisionModel;

class DivisionController extends BaseController
{
    public function index(): string
    {
        $model = model(DivisionModel::class);

        $data = [
            'title' => 'Division Page | LD Planner',
            'divisions' => $model->findAll(),
        ];
        return view('includes/head') .
            view('includes/sidebar') .
            view('includes/nav') .
            view('forms/division_form', $data) .
            view('includes/footer');
    }

    public function show($slug = null)
    {

    }

    public function create()
    {
        $model = model(DivisionModel::class);

        if (!$this->validate([
            'division_name' => 'required|min_length[3]|alpha_numeric_spaces',
        ])) {
            $errors = [
                'errors' => $this->validator->getError(),
            ];
            return view('includes/head') .
                view('includes/sidebar') .
                view('includes/nav') .
                view('forms/division_form', $errors) .
                view('includes/footer');
        }

        // the validation was successful

        // get the validated data
        $validData = $this->validator->getValidated();

        $model->save([
            'division_name' => $validData['division_name'],
        ]);
        return redirect('ldm.divisions');
    }

    public function edit($slug)
    {

    }

    public function update($slug)
    {

    }

    public function delete($slug)
    {

    }
}
