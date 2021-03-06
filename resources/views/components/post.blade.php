
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->

    @props(['post'=> $post])

    <div class="mb-4">
                                        <a href="{{ route('users.posts', $post->user) }}" class="font-bold mr-2" >{{ $post-> user -> username }}</a><span class="text-gray-600 text-sm">{{ $post -> created_at -> toDateString() }}</span>
                                       <!-- {{ $post -> created_at -> diffForHumans() }} -->

                                        <p class="mb-2">{{ $post->body }}</p>

                                        <div>

                                        @can('delete', $post)
                                      
                                               <form action="{{ route('posts.destroy', $post ) }}" method="post" class="mr-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-blue-500">Delete</button>
                                              </form>
                                         @endcan 


                                        </div>

                                    <div class="flex items-center">
                                    @auth()
                                        @if(!$post->likedBy(auth()->user()))

                                            <form action="{{ route('posts.likes', $post ) }}" method="post" class="mr-1">
                                                @csrf
                                                    <button type="submit" class="text-blue-500">Like</button>
                                            </form>

                                            @else
                                        
                                                <form action="{{ route('posts.likes', $post ) }}" method="post" class="mr-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-blue-500">Unlike</button>
                                            </form>
                                          @endif
                                    @endauth

                                          
                                            <span>{{ $post -> likes -> count() }} {{ Str::plural('like', $post -> likes -> count() )  }}</span>

                                  
                                     </div>

                                </div>

