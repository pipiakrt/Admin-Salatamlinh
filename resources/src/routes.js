// Home
import Home from './pages/Home'
// Langding Page
import LangdingPage from './pages/LangdingPage'
// Categories
import Categories from './pages/Categories/index'
import CategoryHightLight from './pages/Categories/hightlight'
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
import CreateBanner from './pages/Banner/create'
// Slider
import Slider from './pages/Slider/index'
import CreateSlider from './pages/Slider/create'
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
    // Banner
    {
        path: '/anh-bia/danh-sach',
        component: Banner,
        name: 'Banner',
    },
    {
        path: '/anh-bia/them-moi',
        component: CreateBanner,
        name: 'Banner',
    },
    // Slider
    {
        path: '/thanh-truot/danh-sach',
        component: Slider,
        name: 'Slider',
    },
    {
        path: '/thanh-truot/them-moi',
        component: CreateSlider,
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