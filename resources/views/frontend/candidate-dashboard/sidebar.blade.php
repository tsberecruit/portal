<div class="col-lg-3 col-md-4 col-sm-12">
    <div class="box-nav-tabs nav-tavs-profile mb-5">
      <ul class="nav" role="tablist">
        <li><a class="btn btn-border mb-20 active" href="{{ route('candidate.profile.index') }}">Dashboard</a></li>
        <li><a class="btn btn-border mb-20" href="candidate-profile.html">My Profile</a></li>
        <li><a class="btn btn-border mb-20" href="candidate-profile-jobs.html">My Jobs</a></li>
        <li><a class="btn btn-border mb-20" href="candidate-profile-save-jobs.html">Saved Jobs</a></li>

         <!-- Authentication -->
         <form method="POST" action="{{ route('logout') }}">
            @csrf
            <li><a class="btn btn-border mb-20" onclick="event.preventDefault();
                                this.closest('form').submit();" href="{{ route('logout') }}">Log Out</a></li>
        </form>

      </ul>

    </div>
  </div>
