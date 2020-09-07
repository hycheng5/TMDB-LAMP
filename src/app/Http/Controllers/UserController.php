<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Movie;
class UserController extends Controller
{
    //



    // Returns all movies that the user has
    public function getUserMovies(Request $request){
      //add validation
      $validatedData = $request->validate([
            'user_id' => 'required|integer'
      ]);
      $user = User::find($request->input('user_id'));
      return $user->movies;

    }

    //Gets the users movie by id
    public function getUserMovieById(Request $request){
      $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'movie_id' => 'required|integer'
      ]);
      $movieId = $request->input('movie_id');
      $user = User::find($request->input('user_id'));
      return $user->movies()->where('movie_id',$movieId)->get();
    }

    public function addMovie(Request $request){
      $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'movie_id' => 'required|integer',
            'title' => 'required|string',
            'overview' => 'required|string',
            'release_date' => 'required|string'

      ]);
      $movie = new movie();
      $movie->user_id = $request->input('user_id');
      $movie->movie_id = $request->input('movie_id');
      $movie->title = $request->input('title');
      $movie->overview = $request->input('overview');
      $movie->releaseDate = $request->input('release_date');
      $movie->save();
    }

    //Removes the movie id
    public function removeMovie(Request $request){
      //add validation
      $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'movie_id' => 'required|integer'
      ]);
      $user = User::find($request->input('user_id'));
      $user->movies()->where('movie_id',$request->input('movie_id'))->delete();
      return response(200);

    }
    //Checks if user owns given movies
    public function checkUserOwnMovieList(Request $request){
        $validatedData = $request->validate([
              'user_id' => 'required|integer',
              'movie_list' => 'required'
        ]);
        $movieList = $request->input('movie_list');
        $user = User::find($request->input('user_id'));
        $movieResult= $user->movies()->whereIn('movie_id', $movieList)->get();

        return $movieResult;
    }

    //Check is user owns specific movie
    public function checkUserOwnsMovie(Request $request){
      $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'movie_id' => 'required|integer'
      ]);
      $movie_id = $request->input('movie_id');
      $user = User::find($request->input('user_id'));
      $result =$user->movies()->where('movie_id', $movie_id)->exists();
      if($result){
        return "true";
      }else{
        return "false";
      }
    }


}
