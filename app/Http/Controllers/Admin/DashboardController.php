<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Table;
use App\Models\Promotion;
use App\Models\Order;
use App\Models\Review;
use App\Models\Notification;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard.
     */
    public function index()
    {
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalTables = Table::count();
        $totalPromotions = Promotion::count();
        $totalOrders = Order::count();
        $totalReviews = Review::count();
        $totalNotifications = Notification::count();

        return view('dashboard.index', compact(
            'totalCategories',
            'totalProducts',
            'totalTables',
            'totalPromotions',
            'totalOrders',
            'totalReviews',
            'totalNotifications'
        ));
    }
}