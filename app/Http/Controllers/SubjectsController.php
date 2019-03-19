<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('subjects.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'espb' => 'required',
      'type' => 'required',
      'professor' => 'required'
    ]);

    $subject = new Subject;
    $subject->name = $request->input('name');
    $subject->espb = $request->input('espb');
    $subject->type = $request->input('type');
    $subject->professor = $request->input('professor');
    $subject->save();

    return redirect('/students')->with('success', 'Subject created!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $subject = Subject::findOrFail($id);
      return view('subjects.show')->with('subject', $subject);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $subject = Subject::findOrFail($id);
    return view('subjects.edit')->with('subject', $subject);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'espb' => 'required',
      'type' => 'required',
      'professor' => 'required'
    ]);

    $subject = Subject::findOrFail($id);
    $subject->name = $request->input('name');
    $subject->espb = $request->input('espb');
    $subject->type = $request->input('type');
    $subject->professor = $request->input('professor');
    $subject->save();

    return redirect('/students')->with('success', 'Subject updated!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $subject = Subject::findOrFail($id);
    $subject->delete();

    return redirect('students')->with('success', 'Subject deleted');
  }
}