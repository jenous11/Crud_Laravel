<x-app-layout>

    <table class="table-auto flex justify-items-center ">
        <tr class="border-2 border-solid">
            <th class="border-2 border-solid">id</th>
            <th class="border-2 border-solid">name</th>
            <th class="border-2 border-solid">email</th>
            <th class="border-2 border-solid">role</th>
            <th class="border-2 border-solid">action</th>
        </tr>
        @foreach ($users as $user)
            <tr class="border-2 border-solid">
                <td class="border-2 border-solid">{{ $user->id }}</td>
                <td class="border-2 border-solid">{{ $user->name }}</td>
                <td class="border-2 border-solid">{{ $user->email }}</td>
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


    <br>
    {{-- table for posts --}}
    <table class="table-auto flex justify-items-center ">
        <tr class="border-2 border-solid">
            <th class="border-2 border-solid">ID</th>
            <th class="border-2 border-solid">Title</th>
            <th class="border-2 border-solid">Author</th>
            <th class="border-2 border-solid">Action</th>
        </tr>
        @foreach ($posts as $post)
            <tr class="border-2 border-solid">
                <td class="border-2 border-solid">{{ $post->id }}</td>
                <td class="border-2 border-solid">{{ $post->title }}</td>
                <td class="border-2 border-solid">{{ $post->user->name }}</td>

                <td class="border-2 border-solid">
                    <form action="{{ route('admin.destroyPost', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                    <form action="{{ route('admin.editPost', $post->id) }} " method="PUT">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="text-blue-500">Edit</button>
                    </form>
                </td>
            </tr>
        @endforeach


    </table>
</x-app-layout>
