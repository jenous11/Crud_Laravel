<x-app-layout>
  <table class="table-auto flex justify-items-center ">
      <tr class="border-2 border-solid">
        <th class="border-2 border-solid">id</th>
        <th class="border-2 border-solid">name</th>
      <th class="border-2 border-solid">email</th>
      <th class="border-2 border-solid">role</th>
<th class="border-2 border-solid">action</th>
    </tr>
    @foreach($users as $user)
    <tr class="border-2 border-solid">
    <td class="border-2 border-solid" >{{$user->id}}</td>
    <td class="border-2 border-solid"  >{{$user->name}}</td>
    <td class="border-2 border-solid"   >{{$user->email}}</td>
    <td class="border-2 border-solid">{{ $user->roles }}</td>
<td class="border-2 border-solid">
    <form action="{{ route('admin.destroyUser', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500">Delete</button>
    </form>
</td>
    </tr>
    @endforeach
  </table>
</x-app-layout>
