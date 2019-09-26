@extends('layouts.admin')
@section('page_title')
User List   
@endsection
@section('adminpanel_content')
<div class="span_3">
    <div class="bs-example1" data-example-id="contextual-table">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php $index=0?>
            @forelse ($all_users as $user)
              <tr>
                  <th scope="row">{{++$index}}</th>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->category}}</td>
                  <td>
                      <li class="dropdown" style="list-style:none;">
                    <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                  
                  <li class="m_2"><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                  <li class="m_2"><a href="#"><i class="fa fa-ban"></i> Delete</a></li>
      
                                                                  
      
      
                    </ul>
                      </li>
                  </td>
                </tr>
            @empty
              <tr>
                  <th scope="row"><h4>No Users Added</h4></th>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                
              </tr>
              
            @endforelse
          
          
        </tbody>
      </table>
     </div>
 </div>
 @endsection