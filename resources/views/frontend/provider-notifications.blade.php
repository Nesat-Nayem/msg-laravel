@extends('frontend.layouts.app')
@section('content')

<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div>
                    <h4 class="widget-title">Notifications</h4>
                    <div class="notcenter">
                        @if (Auth::guard('providerpanel')->user())
                        @forelse($notifications as $notification)
                        <div class="notificationlist markall">
                            <div class="inner-content-blk position-relative">
                                <div class="d-flex text-dark">
                                    <div class="noti-contents">
                                        <h3>
                                            <strong>{{
                                                $notification->data['name'] }} {{ $notification->data['noti-msg']
                                                }}</strong>
                                        </h3>
                                        <span>{{ $notification->created_at->format('d M Y') }}</span>
                                        <a href="#" rel="tooltip" title="Mark as read" class="link-danger mark-as-read"
                                            data-id="{{ $notification->id }}">X
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
