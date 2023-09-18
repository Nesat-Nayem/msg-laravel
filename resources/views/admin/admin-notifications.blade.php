@extends('admin.layouts.app')
@section('content')

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div>
                    <h3 class="widget-title">Notifications</h3>
                </div>
                <div class="noti-content mt-4">
                    <ul class="notification-list">
                        @if (Auth::guard('adminpanel')->user())
                        @forelse($notifications as $notification)
                        <li class="notification-message">
                            <div class="media">
                                <div class="media-body mark-all">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="noti-details"> <span class="noti-title" style="color: #0C6FB4;">{{
                                                        $notification->data['name'] }} &nbsp;</span></p>
                                            <span style="color: #F48731;"> - {{ $notification->data['noti-msg']
                                                    }}</span>
                                            <p class="noti-time"><span class="notification-time"></span></p> <br>
                                        </div>
                                        <div class="col-md-3">
                                            <span style="color: #F48731;"> {{ $notification->created_at->format('d M Y') }} </span>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" rel="tooltip" title="Mark as read" class="link-danger mark-as-read" data-id="{{ $notification->id }}">X
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>
                        @if ($loop->last)
                        <div class="mt-2">
                            <a href="#" class="btn default-btn" id="mark-all">
                                Mark all as read
                            </a>
                        </div>
                        @endif
                        @empty
                        There are no new notifications
                        @endforelse
                        @else
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
