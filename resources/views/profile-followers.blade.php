<x-profile :sharedData="$sharedData" doctitle="{{$sharedData['username']}}'s Followers">
    <div class="list-group">
      @foreach($followers as $follow)
      <a href="/profile/{{$follow->userDoingTheFollowing->username}}" class="list-group-item list-group-item-action">
        <img class="avatar-tiny" src="https://gravatar.com/avatar/b9408a09298632b5151200f3449434ef?s=128" />
        {{$follow->userDoingTheFollowing->username}}
      </a>
      @endforeach
    </div>
  </x-profile>