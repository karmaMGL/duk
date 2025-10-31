@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Admin Dashboard</h1>
        <p class="text-gray-600">Manage your driving test platform</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Users</p>
                    <p class="text-2xl font-bold text-gray-900">{{$stats['users']}}</p>
                    <p class="text-sm text-green-600">+12% from last month</p>
                </div>
                <i data-lucide="users" class="w-8 h-8 text-blue-600"></i>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Subscriptions</p>
                    <p class="text-2xl font-bold text-gray-900">1,923</p>
                    <p class="text-sm text-green-600">+8% from last month</p>
                </div>
                <i data-lucide="trophy" class="w-8 h-8 text-green-600"></i>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Questions Bank</p>
                    <p class="text-2xl font-bold text-gray-900">1,247</p>
                    <p class="text-sm text-green-600">+23 from last month</p>
                </div>
                <i data-lucide="book-open" class="w-8 h-8 text-purple-600"></i>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Monthly Revenue</p>
                    <p class="text-2xl font-bold text-gray-900">$45,230</p>
                    <p class="text-sm text-green-600">+15% from last month</p>
                </div>
                <i data-lucide="dollar-sign" class="w-8 h-8 text-orange-600"></i>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Main Column -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Quick Actions -->
            <div class="bg-white shadow rounded-lg">
                <div class="border-b p-6">
                    <h2 class="text-lg font-semibold">Quick Actions</h2>
                    <p class="text-sm text-gray-500">Common administrative tasks</p>
                </div>
                <div class="p-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="/admin/questions/new"
                        class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-3">
                            <i data-lucide="plus" class="w-6 h-6 text-white"></i>
                        </div>
                        <span class="text-sm font-medium text-center">Add Question</span>
                    </a>
                    <a href="/admin/users"
                        class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-3">
                            <i data-lucide="users" class="w-6 h-6 text-white"></i>
                        </div>
                        <span class="text-sm font-medium text-center">Manage Users</span>
                    </a>
                    <a href="/admin/reports"
                        class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mb-3">
                            <i data-lucide="bar-chart-3" class="w-6 h-6 text-white"></i>
                        </div>
                        <span class="text-sm font-medium text-center">View Reports</span>
                    </a>
                    <a href="/admin/settings"
                        class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center mb-3">
                            <i data-lucide="settings" class="w-6 h-6 text-white"></i>
                        </div>
                        <span class="text-sm font-medium text-center">System Settings</span>
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white shadow rounded-lg">
                <div class="border-b p-6">
                    <h2 class="text-lg font-semibold">Recent Activity</h2>
                    <p class="text-sm text-gray-500">Latest system events and user actions</p>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-start space-x-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-2 h-2 rounded-full bg-blue-600 mt-2"></div>
                        <div>
                            <p class="text-sm text-gray-900">New user registration: john.doe@email.com</p>
                            <p class="text-xs text-gray-500">2 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-2 h-2 rounded-full bg-purple-600 mt-2"></div>
                        <div>
                            <p class="text-sm text-gray-900">Question updated: Traffic Laws #45</p>
                            <p class="text-xs text-gray-500">15 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-2 h-2 rounded-full bg-green-600 mt-2"></div>
                        <div>
                            <p class="text-sm text-gray-900">Payment received: $39.99 from Sarah Johnson</p>
                            <p class="text-xs text-gray-500">1 hour ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-2 h-2 rounded-full bg-orange-600 mt-2"></div>
                        <div>
                            <p class="text-sm text-gray-900">New exam completed with 92% score</p>
                            <p class="text-xs text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- System Status -->
            <div class="bg-white shadow rounded-lg">
                <div class="border-b p-6">
                    <h2 class="text-lg font-semibold">System Status</h2>
                    <p class="text-sm text-gray-500">Current system health and performance</p>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-green-600 rounded-full"></div>
                            <span class="font-medium">Database</span>
                        </div>
                        <span class="text-sm bg-green-100 text-green-800 px-2 py-1 rounded">Healthy</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-green-600 rounded-full"></div>
                            <span class="font-medium">API Services</span>
                        </div>
                        <span class="text-sm bg-green-100 text-green-800 px-2 py-1 rounded">Online</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-yellow-50 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 bg-yellow-600 rounded-full"></div>
                            <span class="font-medium">Payment Gateway</span>
                        </div>
                        <span class="text-sm bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Slow</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Management -->
            <div class="bg-white shadow rounded-lg">
                <div class="border-b p-6">
                    <h2 class="text-lg font-semibold">Management</h2>
                </div>
                <div class="p-6 space-y-3">
                    <a href="/admin/users"
                        class="block w-full px-4 py-2 text-left text-sm bg-gray-100 rounded hover:bg-gray-200"><i
                            data-lucide="users" class="w-4 h-4 inline mr-2"></i>User Management</a>
                    <a href="/admin/questions"
                        class="block w-full px-4 py-2 text-left text-sm bg-gray-100 rounded hover:bg-gray-200"><i
                            data-lucide="book-open" class="w-4 h-4 inline mr-2"></i>Question Bank</a>
                    <a href="/admin/exams"
                        class="block w-full px-4 py-2 text-left text-sm bg-gray-100 rounded hover:bg-gray-200"><i
                            data-lucide="trophy" class="w-4 h-4 inline mr-2"></i>Exam Management</a>
                    <a href="/admin/payments"
                        class="block w-full px-4 py-2 text-left text-sm bg-gray-100 rounded hover:bg-gray-200"><i
                            data-lucide="dollar-sign" class="w-4 h-4 inline mr-2"></i>Payments</a>
                </div>
            </div>

            <!-- Alerts -->
            <div class="bg-white shadow rounded-lg">
                <div class="border-b p-6 flex items-center">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-yellow-600 mr-2"></i>
                    <h2 class="text-lg font-semibold">Alerts</h2>
                </div>
                <div class="p-6 space-y-3">
                    <div class="p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <p class="text-sm font-medium text-yellow-800">Payment Gateway Slow</p>
                        <p class="text-xs text-yellow-600">Response time increased by 200ms</p>
                    </div>
                    <div class="p-3 bg-blue-50 border border-blue-200 rounded-lg">
                        <p class="text-sm font-medium text-blue-800">New Feature Request</p>
                        <p class="text-xs text-blue-600">5 users requested mobile app</p>
                    </div>
                </div>
            </div>

            <!-- Today's Stats -->
            <div class="bg-white shadow rounded-lg">
                <div class="border-b p-6">
                    <h2 class="text-lg font-semibold">Today's Stats</h2>
                </div>
                <div class="p-6 space-y-3">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">New Users:</span>
                        <span class="font-medium">23</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Exams Taken:</span>
                        <span class="font-medium">156</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Revenue:</span>
                        <span class="font-medium">$1,247</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Support Tickets:</span>
                        <span class="font-medium">8</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    lucide.createIcons();
</script>
@endpush
