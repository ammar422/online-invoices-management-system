<?php

namespace App\Http\Controllers\Section;

use App\Models\Section;
use App\Http\Controllers\Controller;
use App\Http\Requests\Section\StoreSectionRequest;
use App\Http\Requests\Section\UpdateSectionRequest;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        return view('sections.sections', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
        $section = Section::create($request->validated());;
        if (!$section) {
            session()->flash('error', 'عفوا حدث خطاء ماء رجاء المحاولة مرة اخرى');
            return to_route('sections.index');
        }
        session()->flash('success', 'لقد تم حفظ القسم(' . $request->name . ') بنجاح');
        return to_route('sections.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return $products = $section->product->pluck('product_name','id');
        return json_encode($products);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, Section $section)
    {

        $updated = $section->update($request->validated());
        if (!$updated) {
            session()->flash('error', 'عفوا حدث خطاء ماء رجاء المحاولة مرة اخرى');
            return to_route('sections.index');
        }
        session()->flash('success', 'تم تعديل القسم بنجاح');
        return to_route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $deleted = $section->delete();
        if (!$deleted) {
            session()->flash('error', 'عفوا حدث خطاء ماء رجاء المحاولة مرة اخرى');
            return to_route('sections.index');
        }
        session()->flash('success', 'تم حذف القسم بنجاح');
        return to_route('sections.index');
    }
}
