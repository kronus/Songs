<?php


class Song extends Eloquent{

    public $timestamps = false;

    protected $table = 'songs';

    protected $fillable = array('id', 'title','original_band', 'description', 'date_posted');
}
