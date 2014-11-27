<?php

class SongController extends \BaseController {

    protected $song;

    public function __construct(Song $song){
        $this->song = $song;
    }

	/**
	 * Display a listing of the songs.
	 *
	 * @return Response
	 */
	public function index()
	{
        //return Response::json(Song::get());
        return Response::json(Song::paginate(6));

	}


	/**
	 * Store a newly created song in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $id = Input::get('id');
        $title = Input::get('title');
        $original_band = Input::get('original_band');
        $description = Input::get('description');
        $date_posted = Input::get('date_posted');

        $song = new Song;
        $song->id = $id;
        $song->title = $title;
        $song->original_band = $original_band;
        $song->description = $description;
        $song->date_posted = $date_posted;
        $song->save();
	}

    /**
     * Store a updated song in storage.
     *
     * @return Response
     */
    public function update($id)
    {
        $song = Song::find($id);

        $input = $input = Input::all();

        if ( $input['id'] )
        {
            $song->id = $input['id'];
        }

        if ( $input['title'] )
        {
            $song->title = $input['title'];
        }

        if ( $input['original_band'] )
        {
            $song->original_band = $input['original_band'];
        }

        if ( $input['description'] )
        {
            $song->description = $input['description'];
        }

        if ( $input['date_posted'] )
        {
            $song->date_posted = $input['date_posted'];
        }

        $song->save();
    }

    /**
     * Return the specified song using JSON
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Response::json(Song::find($id));
    }


	/**
	 * Remove the specified song from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Song::destroy($id);

        return Response::json(array('success' => true));
	}


}
