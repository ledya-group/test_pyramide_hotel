<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab"><i class="icon-list"></i></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><i class="icon-speech"></i></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#settings" role="tab"><i class="icon-settings"></i></a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="timeline" role="tabpanel">
        <div class="callout m-0 py-2 text-muted text-center bg-faded text-uppercase">
            <small><b>Today</b>
            </small>
        </div>
        <hr class="transparent mx-3 my-0">
        <div class="callout callout-warning m-0 py-3">
            <div class="avatar float-right">
                <img src="{{asset('img/avatars/7.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
            </div>
            <div>Meeting with
                <strong>Lucas</strong>
            </div>
            <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 1 - 3pm</small>
            <small class="text-muted"><i class="icon-location-pin"></i>&nbsp; Palo Alto, CA</small>
        </div>
        <hr class="mx-3 my-0">
        <div class="callout callout-info m-0 py-3">
            <div class="avatar float-right">
                <img src="{{ asset('img/avatars/4.jpg') }}" class="img-avatar" alt="admin@bootstrapmaster.com">
            </div>
            <div>Skype with
                <strong>Megan</strong>
            </div>
            <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 4 - 5pm</small>
            <small class="text-muted"><i class="icon-social-skype"></i>&nbsp; On-line</small>
        </div>
        <hr class="transparent mx-3 my-0">
        <div class="callout m-0 py-2 text-muted text-center bg-faded text-uppercase">
            <small><b>Tomorrow</b>
            </small>
        </div>
        <hr class="transparent mx-3 my-0">
        <div class="callout callout-danger m-0 py-3">
            <div>New UI Project -
                <strong>deadline</strong>
            </div>
            <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 10 - 11pm</small>
            <small class="text-muted"><i class="icon-home"></i>&nbsp; creativeLabs HQ</small>
            <div class="avatars-stack mt-2">
                <div class="avatar avatar-xs">
                    <img src="{{asset('img/avatars/2.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                    <img src="{{asset('img/avatars/3.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                    <img src="{{asset('img/avatars/4.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                    <img src="{{asset('img/avatars/5.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
            </div>
        </div>
        <hr class="mx-3 my-0">
        <div class="callout callout-success m-0 py-3">
            <div>
                <strong>#10 Startups.Garden</strong>Meetup</div>
            <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 1 - 3pm</small>
            <small class="text-muted"><i class="icon-location-pin"></i>&nbsp; Palo Alto, CA</small>
        </div>
        <hr class="mx-3 my-0">
        <div class="callout callout-primary m-0 py-3">
            <div>
                <strong>Team meeting</strong>
            </div>
            <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 4 - 6pm</small>
            <small class="text-muted"><i class="icon-home"></i>&nbsp; creativeLabs HQ</small>
            <div class="avatars-stack mt-2">
                <div class="avatar avatar-xs">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
            </div>
        </div>
        <hr class="mx-3 my-0">
    </div>
    <div class="tab-pane p-3" id="messages" role="tabpanel">
        <div class="message">
            <div class="py-3 pb-5 mr-3 float-left">
                <div class="avatar">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="avatar-status badge-success"></span>
                </div>
            </div>
            <div>
                <small class="text-muted">Lukasz Holeczek</small>
                <small class="text-muted float-right mt-1">1:52 PM</small>
            </div>
            <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
            <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
        </div>
        <hr>
        <div class="message">
            <div class="py-3 pb-5 mr-3 float-left">
                <div class="avatar">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="avatar-status badge-success"></span>
                </div>
            </div>
            <div>
                <small class="text-muted">Lukasz Holeczek</small>
                <small class="text-muted float-right mt-1">1:52 PM</small>
            </div>
            <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
            <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
        </div>
        <hr>
        <div class="message">
            <div class="py-3 pb-5 mr-3 float-left">
                <div class="avatar">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="avatar-status badge-success"></span>
                </div>
            </div>
            <div>
                <small class="text-muted">Lukasz Holeczek</small>
                <small class="text-muted float-right mt-1">1:52 PM</small>
            </div>
            <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
            <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
        </div>
        <hr>
        <div class="message">
            <div class="py-3 pb-5 mr-3 float-left">
                <div class="avatar">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="avatar-status badge-success"></span>
                </div>
            </div>
            <div>
                <small class="text-muted">Lukasz Holeczek</small>
                <small class="text-muted float-right mt-1">1:52 PM</small>
            </div>
            <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
            <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
        </div>
        <hr>
        <div class="message">
            <div class="py-3 pb-5 mr-3 float-left">
                <div class="avatar">
                    <img src="{{asset('img/avatars/6.jpg')}}" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="avatar-status badge-success"></span>
                </div>
            </div>
            <div>
                <small class="text-muted">Lukasz Holeczek</small>
                <small class="text-muted float-right mt-1">1:52 PM</small>
            </div>
            <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
            <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
        </div>
    </div>
    <div class="tab-pane p-3" id="settings" role="tabpanel">
        <h6>Settings</h6>

        <div class="aside-options">
            <div class="clearfix mt-4">
                <small><b>Option 1</b>
                </small>
                <label class="switch switch-text switch-pill switch-success switch-sm float-right">
                    <input type="checkbox" class="switch-input" checked="">
                    <span class="switch-label" data-on="On" data-off="Off"></span>
                    <span class="switch-handle"></span>
                </label>
            </div>
            <div>
                <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
            </div>
        </div>
    </div>
</div>