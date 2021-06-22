// Home
import Home from './pages/Home'
// Langding Page
import LangdingPage from './pages/LangdingPage'
// Categories
import Categories from './pages/Categories/index'
import CategoryHightLight from './pages/Categories/hightlight'
// Orders
import OrderPending from './pages/Orders/pending'
import OrderProcess from './pages/Orders/process'
import OrderSuccess from './pages/Orders/success'
import OrderCancel from './pages/Orders/cancel'
// Notifications
import Notifications from './pages/Notifications/index'
// Users
import Users from './pages/Users/index'
// Reports
import Reports from './pages/Reports/index'
// Menu
import MenuSearch from './pages/Menu/search'
import MenuCategory from './pages/Menu/category'
// Products
import Products from './pages/Products/index'
import CreateProduct from './pages/Products/create'
import EditProduct from './pages/Products/edit'
import CategoryProduct from './pages/Products/category'
import ProductHightLight from './pages/Products/hightlight'
import ProductTop from './pages/Products/top'
import ProductHot from './pages/Products/hot'
// posts
import Posts from './pages/Posts/index'
import CreatePost from './pages/Posts/create'
import EditPost from './pages/Posts/edit'
import CategoryPost from './pages/Posts/category'
// Banner
import Banner from './pages/Banner/index'
// Slider
import Slider from './pages/Slider/index'
// Account
import Account from './pages/Account/index'
import Profile from './pages/Account/profile'
import CreateUser from './pages/Account/create'
import Password from './pages/Account/password'
// FileManager
import FileManager from './pages/FileManager/index'
// error
import Error from './pages/Error'

const routes = [
    // Home
    {
        path: '/',
        component: Home,
        name: 'Home',
    },
    // Langding Page
    {
        path: '/langdingpage',
        component: LangdingPage,
        name: 'LangdingPage',
    },
    // Categories
    {
        path: '/danh-muc/danh-sach',
        component: Categories,
        name: 'Categories',
    },
    {
        path: '/danh-muc/danh-muc-noi-bat',
        component: CategoryHightLight,
        name: 'Categories',
    },
    // Orders
    {
        path: '/don-hang/cho-xac-nhan',
        component: OrderPending,
        name: 'Orders',
    },
    {
        path: '/don-hang/dang-giao',
        component: OrderProcess,
        name: 'Orders',
    },
    {
        path: '/don-hang/hoan-thanh',
        component: OrderSuccess,
        name: 'Orders',
    },
    {
        path: '/don-hang/don-huy',
        component: OrderCancel,
        name: 'Orders',
    },
    // Users
    {
        path: '/nguoi-dung/danh-sach',
        component: Users,
        name: 'Users',
    },
    // Notifications
    {
        path: '/nguoi-dung/thong-bao',
        component: Notifications,
        name: 'Users',
    },
    // Reports
    {
        path: '/nguoi-dung/phan-hoi',
        component: Reports,
        name: 'Users',
    },
    // Products
    {
        path: '/san-pham/danh-sach',
        component: Products,
        name: 'Products',
    },
    {
        path: '/san-pham/them-moi',
        component: CreateProduct,
        name: 'Products',
    },
    {
        path: '/san-pham/:id/chinh-sua',
        component: EditProduct,
        name: 'Products',
    },
    {
        path: '/san-pham/danh-muc',
        component: CategoryProduct,
        name: 'Products',
    },
    {
        path: '/san-pham/san-pham-noi-bat',
        component: ProductHightLight,
        name: 'Products',
    },
    {
        path: '/san-pham/san-pham-hot',
        component: ProductHot,
        name: 'Products',
    },
    {
        path: '/san-pham/san-pham-top',
        component: ProductTop,
        name: 'Products',
    },
    // Posts
    {
        path: '/bai-viet/danh-sach',
        component: Posts,
        name: 'Posts',
    },
    {
        path: '/bai-viet/them-moi',
        component: CreatePost,
        name: 'Posts',
    },
    {
        path: '/bai-viet/:id/chinh-sua',
        component: EditPost,
        name: 'Posts',
    },
    {
        path: '/bai-viet/danh-muc',
        component: CategoryPost,
        name: 'Posts',
    },
    // Menu
    {
        path: '/menu/tim-kiem',
        component: MenuSearch,
        name: 'Menu',
    },
    {
        path: '/menu/danh-muc',
        component: MenuCategory,
        name: 'Menu',
    },
    // Banner
    {
        path: '/anh-bia/danh-sach',
        component: Banner,
        name: 'Banner',
    },
    // Slider
    {
        path: '/thanh-truot/danh-sach',
        component: Slider,
        name: 'Slider',
    },
    // Account
    {
        path: '/tai-khoan',
        component: Account,
        name: 'Account',
    },
    {
        path: '/tai-khoan/thong-tin',
        component: Profile,
        name: 'Account',
    },
    {
        path: '/tai-khoan/them-tai-khoan',
        component: CreateUser,
        name: 'Account',
    },
    {
        path: '/tai-khoan/mat-khau',
        component: Password,
        name: 'Account',
    },
    // FileManager
    {
        path: '/tep-tin',
        component: FileManager,
        name: 'FileManager',
    },
    // error
    {
        path: '/:pathMatch(.*)*',
        component: Error,
        name: '404',
    },
];

export default routes;