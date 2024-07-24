@extends('layouts.main')
@section('content')
<main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
<div class="w-full px-6 py-6 mx-auto">
    <!-- Overview Cards -->
    <div class="flex flex-wrap -mx-3 mb-6">
        <!-- Card: Total Articles -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">Total Articles</p>
                                <h5 class="mb-0 font-bold">
                                    1,200
                                    <span class="text-sm leading-normal font-weight-bolder text-lime-500">+5%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                <i class="ni leading-none ni-folder-17 text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card: New Comments -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">New Comments</p>
                                <h5 class="mb-0 font-bold">
                                    342
                                    <span class="text-sm leading-normal font-weight-bolder text-lime-500">+10%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                <i class="ni leading-none ni-chat-round text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card: Total Users -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">Total Users</p>
                                <h5 class="mb-0 font-bold">
                                    8,400
                                    <span class="text-sm leading-normal font-weight-bolder text-lime-500">+8%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                <i class="ni leading-none ni-single-02 text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card: Monthly Visits -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal">Monthly Visits</p>
                                <h5 class="mb-0 font-bold">
                                    50,000
                                    <span class="text-sm leading-normal font-weight-bolder text-lime-500">+15%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Articles Table -->
    <div class="flex flex-col bg-white shadow-soft-xl rounded-2xl p-6">
        <div class="mb-4">
            <h2 class="text-xl font-bold">Latest Articles</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-800 tracking-wider">Title</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-800 tracking-wider">Author</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-800 tracking-wider">Category</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-800 tracking-wider">Date</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm">New Policy Updates</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm">John Doe</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm">Politics</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm">July 23, 2024</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm">
                            <a href="#" class="text-blue-600 hover:text-blue-800">View</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm">Tech Innovations</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm">Jane Smith</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm">Technology</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm">July 22, 2024</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm">
                            <a href="#" class="text-blue-600 hover:text-blue-800">View</a>
                        </td>
                    </tr>
                    <!-- More rows... -->
                </tbody>
            </table>
        </div>
    </div>

        <footer class="pt-4">
          <div class="w-full px-6 mx-auto">
            <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
              <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                  ©
                  <script>
                    document.write(new Date().getFullYear() + ",");
                  </script>
                  made with <i class="fa fa-heart"></i> by
                  <a href="https://www.creative-tim.com" class="font-semibold text-slate-700" target="_blank">Creative Tim</a>
                  for a better web.
                </div>
              </div>
              <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                  <li class="nav-item">
                    <a href="https://www.creative-tim.com" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500" target="_blank">Creative Tim</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://www.creative-tim.com/presentation" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500" target="_blank">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://creative-tim.com/blog" class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500" target="_blank">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://www.creative-tim.com/license" class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-soft-in-out text-slate-500" target="_blank">License</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <!-- end cards -->
@endsection