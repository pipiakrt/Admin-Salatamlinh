// home
import Home from './pages/Home'
Products
import Products from './pages/Products/index'
import CreatePost from './pages/Products/create'
import EditPost from './pages/Products/edit'
import CategoryPost from './pages/Products/category'
// Banner
import Banner from './pages/Banner/index'
import CreateBanner from './pages/Banner/create'
// // Slider
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
    {
        path: '/',
        component: Home,
        name: 'Home',
    },
    // Products
    {
        path: '/san-pham/danh-sach',
        component: Products,
        name: 'Products',
    },
    {
        path: '/san-pham/them-moi',
        component: CreatePost,
        name: 'Products',
    },
    {
        path: '/san-pham/:id/chinh-sua',
        component: EditPost,
        name: 'Products',
    },
    {
        path: '/san-pham/danh-muc',
        component: CategoryPost,
        name: 'Products',
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