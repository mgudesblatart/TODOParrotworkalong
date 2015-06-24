<?php namespace todoparrot\Http\Controllers;

use todoparrot\Http\Requests;
use todoparrot\Http\Controllers\Controller;

use Illuminate\Http\Request;
use todoparrot\Todolist;
use todoparrot\Http\Requests\ListFormRequest;

class ListsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lists = Todolist::all();
        return view('lists.index')->with('lists', $lists);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return view('lists.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param ListFormRequest $request
     * @return Response
     */
	public function store(ListFormRequest $request)
	{
		$list = new Todolist(
            array('name'=> $request->get('name'),
                'description'=> $request->get('description')));

        $list->save();

        return \Redirect::route('lists.create')->with('message', 'Your list has been created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$list = Todolist::findOrFail($id);

        return view('lists.show')->with('list',$list);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$list = Todolist::find($id);

        return view('lists.edit')->with('list', $list);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param ListFormRequest $request
     * @return Response
     */
	public function update($id, ListFormRequest $request)
	{
        $list = Todolist::find($id);

        /** @noinspection PhpParamsInspection */
        $list->update([
            'name' =>$request->get('name'),
            'description'=> $request->get('description')
        ]);

        return \Redirect::route('lists.edit', array($list->id))->with('message', 'Your list has been updated!');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Todolist::destory($id);
        return \Redirect::route('lists.index')->with('message', 'The list has been deleted!');
	}

}
