
<a href="{{ url('api/logout') }}"><button>Logout</button></a><br/><br/>

<?php $token = \Illuminate\Support\Facades\Storage::disk('local')->get('token'); ?>

<label>Name: {{ \Tymon\JWTAuth\Facades\JWTAuth::toUser($token)->name }}</label><br/>
<label>Email Id: {{ \Tymon\JWTAuth\Facades\JWTAuth::toUser($token)->email }}</label>
