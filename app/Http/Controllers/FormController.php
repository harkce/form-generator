<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Module;
use App\Form;

class FormController extends BaseController
{
    public function index() {
        $categories = Category::all();
        $modules = Module::with('category')->get();
        $forms = Form::with('module')->get();
        $data = [
            'title' => 'Forms',
            'categories' => $categories,
            'modules' => $modules,
            'forms' => $forms
        ];
        return view('form',$data);
    }

    public function store(Request $request) {
        $input = $request->all();
        echo json_encode($input); die();
        $result = array(
            'name' => $input['name'],
            'table_name' => $input['table_name']
        );
        $forms = array();
        $elements = intval($input['elements']);
        for ($i=1; $i <= $elements; $i++) {
            $type = $input['element' . $i . '_type'];
            $txt = array(
                'name' => $input['element' . $i . '_name'],
                'id' => $input['element' . $i . '_id'],
                'label' => $input['element' . $i . '_label'],
            );
            switch ($type) {
                case 'text':
                    $txt['type'] = 'text';
                    $txt['max_length'] = $input['element' . $i . '_length'];
                    if (isset($input['element' . $i . '_required'])) {
                        $txt['required'] = $input['element' . $i . '_required'];
                    } else {
                        $txt['required'] = 'false';
                    }
                    array_push($forms, $txt);
                    break;
                
                case 'radio':
                    $txt['type'] = 'radio';
                    if (isset($input['element' . $i . '_required'])) {
                        $txt['required'] = $input['element' . $i . '_required'];
                    } else {
                        $txt['required'] = 'false';
                    }
                    $op_cnt = intval($input['element' . $i . '_options']);
                    $options = array();
                    for ($j = 1; $j <= $op_cnt; $j++) {
                        array_push($options, array('value' => $input['element' . $i . '_value' . $j], 'text' => $input['element' . $i . '_option' . $j]));
                    }
                    $txt['options'] = $options;
                    array_push($forms, $txt);
                    break;

                case 'checkbox':
                    $txt['type'] = 'checkbox';
                    $txt['required'] = 'false';
                    $op_cnt = intval($input['element' . $i . '_options']);
                    $options = array();
                    for ($j = 1; $j <= $op_cnt; $j++) {
                        array_push($options, array('value' => $input['element' . $i . '_value' . $j], 'text' => $input['element' . $i . '_option' . $j]));
                    }
                    $txt['options'] = $options;
                    array_push($forms, $txt);
                    break;

                case 'select':
                    $txt['type'] = 'select';
                    if (isset($input['element' . $i . '_required'])) {
                        $txt['required'] = $input['element' . $i . '_required'];
                    } else {
                        $txt['required'] = 'false';
                    }
                    $op_cnt = intval($input['element' . $i . '_options']);
                    $options = array();
                    for ($j = 1; $j <= $op_cnt; $j++) {
                        array_push($options, array('value' => $input['element' . $i . '_value' . $j], 'text' => $input['element' . $i . '_option' . $j]));
                    }
                    $txt['options'] = $options;
                    array_push($forms, $txt);
                    break;

                case 'textarea':
                    $txt['type'] = 'textarea';
                    $txt['max_length'] = $input['element' . $i . '_length'];
                    if (isset($input['element' . $i . '_required'])) {
                        $txt['required'] = $input['element' . $i . '_required'];
                    } else {
                        $txt['required'] = 'false';
                    }
                    array_push($forms, $txt);
                    break;

                default:
                    # code...
                    break;
            }
        }
        $result['forms'] = $forms;
        // $result = json_encode($result);
        return $this->jsonResponse('success', null, $result);
        $frm = new Form();
        $frm->structure = $result;
        $frm->module_id = $input['module'];
        $frm->save();
    }

    public function show($id) {
        $form = Form::where('module_id', $id)->first();
        // return $this->jsonResponse('success',null,json_decode($form->structure));
        echo $form->structure;
    }

    public function view($id) {
        return view('test', ['id' => $id]);
    }

    public function nyobain(Request $request) {
        return $this->jsonResponse('success', null, $request->all());
    }
}
