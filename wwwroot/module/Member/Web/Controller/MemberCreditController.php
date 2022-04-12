<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Web\Controller; use Illuminate\Support\Facades\View; use ModStart\App\Web\Layout\WebPage; use ModStart\Core\Input\Request; use ModStart\Field\AbstractField; use ModStart\Field\AutoRenderedFieldValue; use ModStart\Grid\Grid; use ModStart\Grid\GridFilter; use ModStart\Module\ModuleBaseController; use ModStart\Repository\Filter\RepositoryFilter; use Module\Member\Auth\MemberUser; use Module\Member\Support\MemberLoginCheck; class MemberCreditController extends ModuleBaseController implements MemberLoginCheck { private $api; public function __construct() { goto OJxUy; Ay3Du: $this->api = app(\Module\Member\Api\Controller\MemberCreditController::class); goto NfOSf; OJxUy: list($this->viewMemberFrame, $nRAaS) = $this->viewPaths('member.frame'); goto rLI3r; rLI3r: View::share('_viewMemberFrame', $this->viewMemberFrame); goto Ay3Du; NfOSf: } public function index(WebPage $ZcuyS) { goto jRppl; lIj3l: return $ZcuyS->view($vvDaY)->body($fK3QO); goto igNIm; jGz4W: $fK3QO->disableCUD()->disableItemOperate(); goto dPwmH; jRppl: $fK3QO = Grid::make('member_credit_log'); goto xXI8M; OvBch: if (Request::isPost()) { return $fK3QO->request(); } goto xCCcJ; xXI8M: $fK3QO->repositoryFilter(function (RepositoryFilter $P2EU9) { $P2EU9->where(array('memberUserId' => MemberUser::id())); }); goto jGz4W; dPwmH: $fK3QO->useSimple(function (AbstractField $sfBE1, $KdsT8, $D01Cg) { return AutoRenderedFieldValue::makeView('module::Member.View.pc.memberCredit.item', array('item' => $KdsT8)); }); goto OvBch; xCCcJ: list($vvDaY, $nRAaS) = $this->viewPaths('memberCredit.index'); goto mMPKl; mMPKl: $ZcuyS->pageTitle('我的积分'); goto lIj3l; igNIm: } }