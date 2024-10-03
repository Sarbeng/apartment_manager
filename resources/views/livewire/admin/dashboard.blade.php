<div>

    <!-- Dashboard Metrics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
            <p class="text-3xl font-bold text-gray-800">1,234</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Revenue</h3>
            <p class="text-3xl font-bold text-gray-800">$12,345</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Active Subscriptions</h3>
            <p class="text-3xl font-bold text-gray-800">678</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Pending Orders</h3>
            <p class="text-3xl font-bold text-gray-800">45</p>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Recent Orders</h3>
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Order ID</th>
                    <th class="py-3 px-6 text-left">Customer</th>
                    <th class="py-3 px-6 text-center">Status</th>
                    <th class="py-3 px-6 text-center">Total</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">ORD1234</td>
                    <td class="py-3 px-6 text-left">John Doe</td>
                    <td class="py-3 px-6 text-center">
                        <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Completed</span>
                    </td>
                    <td class="py-3 px-6 text-center">$123.45</td>
                    <td class="py-3 px-6 text-center">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded-md">View</button>
                    </td>
                </tr>
                <!-- More rows... -->
            </tbody>
        </table>
    </div>


</div>