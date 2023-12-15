@php
    use App\Models\FooterContact;
    use App\Models\Theme; 
    include "../app/CustomSetting/conf.php";

    $contacts = FooterContact::all(); 
    $themes = Theme::all();
@endphp
<div class="row">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mt-5" style="font-family: 'cwTeXYen'" id="footer">
    <div class="container-fluid">
      <span class="nav-text p-4 mt-4 footerField">
        <div class="row justify-content-around text-left" style="font-size: 16px;">
          <div class="col">
            <dl class="row">
              <p class="h6 col-lg-12 mb-5" style="font-size: 20px;  font-family: 'Poppins', sans-serif;">
                <b>
                  {{ $footer['contact_info'] }}
                </b>
              </p>             
              @forelse ($contacts as $contact)
                <dt class="col-lg-2">
                  {{ $contact -> title }}
                </dt>
                <dd class="col-lg-10">
                  {{ $contact -> content }}
                </dd>
              @empty
                {{ $message['no_content'] }}
              @endforelse              
            </dl>
          </div>
          <div class="col">
            <p class="h6 col-lg-12 mb-5" style="font-size: 20px; font-family: 'Poppins', sans-serif;">              
              <b>
                {{ $footer['map'] }}
              </b>
            </p>
            <dl class="row">                     
              @isset($themes)
                @foreach($themes as $theme)  
                  @if ($theme -> level == 1)  
                    <dd class="col-lg-6">
                        <a href="/theme/{{ $theme -> title }}/" class="text-decoration-none">
                            {{ $navs[$theme -> title] }}
                        </a>
                    </dd>
                  @endif
                @endforeach
              @endisset      
              @if (!Auth::check())
                <dd class="col-lg-6">
                  <a href="{{ route('admin-go-login') }}" class="text-decoration-none" style="color:#fffff;"> 
                    {{ $footer['login'] }}
                  </a>
                </dd>
              @endif                                 
              @if (Auth::check())
                <dd class="col-lg-6">
                  <a href="{{ route('admin-logout') }}" class="text-decoration-none text-success"> 
                    {{ $footer['logout'] }}
                  </a>
                </dd>
              @endif              
            </dl>
          </div>
        </div>
        <div class="row text-left pt-5 pb-2">
          <!-- TODO: Create Views function-->
          <small>
            {{ $footer['views'] }}:
          </small>
          <h5>
            {{ $footer['depart_title'] }}
          </h5>
        </div>
      </span>
    </div>   
  </nav>
</div>