@extends ('layout')
@section ('title','Home')
@section('welcome')
    <h1 class="masthead">Test @ BITSOFT</h1>
    <p class="lead">Given <i>n<sup>2</sup></i> balls of <i>n</i> colors, having a random distribution and <i>n</i> boxes, find a method of filling each
    box with <i>n</i> balls of maximum 2 different colors.</p>
    <div>
      <p>For solving this problem, the following are required:</p>
      <ul style="list-style-position: inside;">
        <li>input for the number of balls (<i>n</i>)</li>
        <li>output of number of balls of each color in each box</li>
        <li>storing history of inputs</li>
        <li>visualizing results from history</li>
      </ul>
    </div>
    <p class="lead">
      <a href="/playgame" class="btn btn-lg btn-secondary">Play</a>
    </p>
@endsection
