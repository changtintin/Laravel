<div class="row bg-primary"> 
  <!-- 政治大學創新創造力研究中心 Logo -->  
  <div class="logo-container">
    <a href="{{ route('index') }}">                   
      <img src="{{ asset('img/depart-logo.png') }}" class="depart-logo">
    </a>
  </div>
  <!-- ./政治大學創新創造力研究中心 Logo -->
</div>
<div class="row bg-primary">     
  <!-- navbar template from boostrap -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary"  style="font-family: 'cwTeXYen'">
    <div class="container-fluid" id="nav_container">       
      <button aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" 
        data-bs-target="#navbar-collapse" data-bs-toggle="collapse" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar-collapse">
        <!-- navbar-nav ms-auto -->
        <ul class="navbar-nav ms-auto">  
          @php
            include "../app/CustomSetting/conf.php";
          @endphp                                                                              
          @forelse ($themeTree -> root -> children as $theme)
            @if($theme -> children)
              <li class="nav-item dropdown mx-3">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">                 
                  {{ $navs[$theme -> title] }}              
                </a>         
                <ul class="dropdown-menu border-0" aria-labelledby="navbarDropdown">
                  <li>                     
                    <a class="dropdown-item" href="/theme/{{ $theme -> title }}"> 
                      <b>{{ $navs[$theme -> title] }} {{ $navs['overview'] }}</b> 
                    </a>                    
                  </li>
                  @foreach ($theme -> children as $childTheme)                                                               
                    <li>                     
                      <a class="dropdown-item" href="/theme/{{ $theme -> title }}/{{ $childTheme -> title }}"> 
                        <b>{{ $navs[$childTheme -> title] }}</b> 
                      </a>                    
                    </li>
                  @endforeach
                </ul>
              </li>
            @else
              <li class="nav-item active mx-3"> 
                <a class="nav-link" href="/theme/{{ $theme -> title }}/">
                  {{ $navs[$theme -> title] }}
                </a> 
              </li>  
            @endif
          @endforeach         
        </ul>
        <!-- ./  navbar-nav ms-auto -->                
      </div>
      <!-- ./ navbar-collapse -->
    </div>
    <!-- ./ container-fluid -->
  </nav>
  <!-- ./ navbar template from boostrap --> 
</div>

