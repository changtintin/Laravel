<div class="row m-4 p-2">
  @php
    use App\Models\MemberType;
    include "../app/CustomSetting/conf.php";

    $memberTypes = (isset($limit))? MemberType::limit(2) -> get() : MemberType::all();
  @endphp
  @forelse ($memberTypes as $memberType)
  <x-h3-title :title="$memberType -> title" />
  <div class='row h3-title-container m-5 gy-4'>
    @forelse ($memberType -> members as $member)
      <div class='col-lg-4 col-md-6 col-sm-12'>
        <div class="card bg-success" style="width: 13rem;">
          <img src="/img/member/{{ $member -> img }}" alt="..." class="card-img">
          <div class="bg-warning">
            <div class="card-body text-success text-center">
              <p class="card-text h6" style="letter-spacing: 8px;">
                {{ $member -> name }}
              </p>
              <p class="card-text">
                {{ $member -> caption }}
              </p>
            </div>
          </div>
        </div>
      </div>
    @empty
      <h5 class="ps-4">待聘</h5>
    @endforelse
  </div>
  @empty
    <p class="m-4 p-4">{{ $message['no_content'] }}</p> 
  @endforelse
</div>
