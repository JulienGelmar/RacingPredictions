@extends('layout.app')

@section('content')
<div class="container-lg py-5">
    <div class="row">
        <div class="col-md-12 px-5">
            <div class="card">
                <div class="card-header">
                    Leaderboard
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">LMP1 Correct</th>
                                <th scope="col">LMP2 Correct</th>
                                <th scope="col">GTE Pro Correct</th>
                                <th scope="col">GTE Am Correct</th>
                                <th scope="col">Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Auth::user()->prediction)
                            <tr style="background-color: #d3d5d6">
                                <th scope="row">{{ $you }}</th>
                                <td>You</td>
                                <td>
                                    @if(Auth::user()->prediction->lmp1_correct)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>
                                    @if(Auth::user()->prediction->lmp2_correct)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>
                                    @if(Auth::user()->prediction->gtepro_correct)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>
                                    @if(Auth::user()->prediction->gteam_correct)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>{{ Auth::user()->points }}</td>
                            </tr>
                            @endif
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ ($users->currentPage() -1) * 100 + ($loop->index + 1) }}</th>
                                <td><a href="/user/{{ $user->id }}">{{ $user->name }}</a></td>
                                <td>
                                    @if($user->prediction->lmp1_correct)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->prediction->lmp2_correct)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->prediction->gtepro_correct)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->prediction->gteam_correct)
                                        <span style="color: green">✓</span>
                                    @else
                                        <span style="color:red">⨉</span>
                                    @endif
                                </td>
                                <td>{{ $user->points }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $users->links() !!}                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection