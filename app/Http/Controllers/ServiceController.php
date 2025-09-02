<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function all()
    {
        $services = Service::get();
        return view('admin.pages.service.all', compact('services'));
    }

    public function add()
    {
        return view('admin.pages.service.add');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                notyf()->error($error);
            }
            return back()->withInput();
        }

        $data = $request->only('name', 'price');

        $service = Service::create($data);
        foreach ($request->description as $values) {
            if ($values != (null || '')) {
                ServiceValue::create([
                    'service_id' => $service->id,
                    'description' => $values
                ]);
            }
        }

        notyf()->success('Service created successfully');

        return back();
    }

    public function edit($id)
    {
        $service = Service::with('service_values')->findOrFail($id);
        return view('admin.pages.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                notyf()->error($error);
            }
            return back()->withInput();
        }

        $data = $request->only('name', 'price');

        $service->update($data);
        ServiceValue::where('service_id', $service->id)->delete();
        foreach ($request->description as $values) {
            if ($values != (null || '')) {
                ServiceValue::create([
                    'service_id' => $service->id,
                    'description' => $values
                ]);
            }
        }

        notyf()->success('Service Updated successfully');

        return back();
    }

    public function delete($id)
    {
        $service = Service::findOrFail($id);
        $service->service_values()->delete();
        $service->delete();
        notyf()->success('Service Deleted successfully');

        return back();
    }
}
