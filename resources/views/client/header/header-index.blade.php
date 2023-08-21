<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ URL::route('home.index') }}"><i class="fas fa-home"></i> Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user"></i> Tác giả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">|</a>
                </li>
                <li class="nav-item dropdown dropdown-notifications">
                    <a href="#notifications-panel" class=" nav-link dropdown-toggle" data-toggle="dropdown">
                        <i data-count="0" class="glyphicon glyphicon-bell notification-icon"><i class="fas fa-bell"></i>
                            Thông báo</a></i>
                    </a>
                    <div class="dropdown-container">
                        <div class="dropdown-toolbar">
                            <div class="dropdown-toolbar-actions">
                                <a href="#">Mark all as read</a>
                            </div>
                            <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)
                            </h3>
                        </div>
                        <ul class="dropdown-menu-3">
                        </ul>
                        <div class="dropdown-footer text-center">
                            <a href="#">View All</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">|</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fas fa-phone"></i> Liên hệ</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-2 mt-2">
            <div class="sign-out d-flex flex-row fs-6">
                @if (auth()->check())
                    <p>{{ auth()->user()->fullname }}</p> <a class="ps-2" href="{{ route('logout.perform') }}"
                        class="dropdown-item">
                        <i class="fas fa-sign-out-alt"></i></a>
                @else
                    <a id="login-btn" href="{{ URL::route('client.login.show') }}" class="black" href="javascript:"
                        data-eid="qd_A06">Đăng nhập <em> | </em> Đăng ký</a>
                @endif
            </div>
        </div>
    </div>
</nav>
<div class="container pt-2">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 text-start">
            <a href="{{ URL::route('home.index') }}">
                <img src="{{ URL::asset('client/img/Icons8-Windows-8-Printing-Books.512.png') }}" width="50px"
                    alt="Logo" class="img-fluid">
                <img src="{{ URL::asset('client/img/Icons8-Windows-8-Printing-Books.512.png') }}" width="50px"
                    alt="Logo" class="img-fluid">
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 d-flex text-center">
            <form action="">
                @include('client.search.search')
            </form>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 text-end mt-2">
            <a class="btn btn-outline-danger"
                href="{{ auth()->check() ? URL::route('admin.dashboard') : route('client.login.show') }}"><i
                    class="fas fa-book"></i>
                Đăng truyện</a>
        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>

<script type="text/javascript">
    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('i[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('ul.dropdown-menu-3');


    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: 'mt1',
        encrypted: true
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('Notify');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('send-message', function(data) {
        var existingNotifications = notifications.html();
        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        var newNotificationHtml = `
          <li class="notification active">
              <div class="media">
                <div class="media-left">
                  <div class="media-object">
                    <img src="{{ URL::asset('admin/build/images/img.jpg') }}" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                  </div>
                </div>
                <div class="media-body">
                  <strong class="notification-title">` + data.title + `</strong>
                  <p class="notification-desc">` + data.content + `</p>
                  <div class="notification-meta">
                    <small class="timestamp">about a minute ago</small>
                  </div>
                </div>
              </div>
          </li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
    });
</script>
