   @foreach ($users as $key=>$user )
                        
                        <tr class="hover:bg-gray-50 transition-colors">
                           <td class="px-6 py-4">
                                <div class="flex items-center">
                                   
                                   {{$key+1}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                   
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{$user['name']}}</div>
                                        <div class="text-sm text-gray-500">{{$user['email']}}</div>
                                    </div>
                                </div>
                            </td>
                            {{-- <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                    Admin
                                </span>
                            </td> --}}
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-1.5 h-1.5 bg-green-400 rounded-full mr-1.5"></span>
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                               {{$user['created_at']}}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                2 hours ago
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium">
                                <div class="flex items-center justify-end gap-2">
                                    <button class="text-blue-600 hover:text-blue-900 p-1 rounded transition-colors" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-green-600 hover:text-green-900 p-1 rounded transition-colors" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900 p-1 rounded transition-colors" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
@endforeach
