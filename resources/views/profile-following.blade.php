<x-profile :sharedData="$sharedData" doctitle="Who {{$sharedData['username']}} follows">
  <div class="list-group">
    @foreach($following as $follow)
    <a href="/profile/{{$follow->userBeingFollowed->username}}" class="list-group-item list-group-item-action">
      <img class="avatar-tiny" src="https://gravatar.com/avatar/b9408a09298632b5151200f3449434ef?s=128" />
      {{$follow->userBeingFollowed->username}}
    </a>
    @endforeach
  </div>
</x-profile>