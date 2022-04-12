<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace Module\Member\Api\Controller; use Illuminate\Routing\Controller; use ModStart\Core\Exception\BizException; use ModStart\Core\Input\InputPackage; use ModStart\Core\Input\Response; use Module\Member\Auth\MemberUser; use Module\Member\Support\MemberLoginCheck; use Module\Member\Util\MemberFavoriteUtil; class MemberFavoriteController extends Controller implements MemberLoginCheck { public function favorite() { goto g7cUJ; LFVoK: $dmpl2 = $HoLMG->getTrimString('categoryId'); goto KS3Hu; g7cUJ: $HoLMG = InputPackage::buildFromInput(); goto n3VJD; XOgX3: if ($vB6nX = $HoLMG->getTrimString('redirect')) { return Response::generate(0, null, null, $vB6nX); } goto ebQgh; KS3Hu: BizException::throwsIfEmpty('category为空', $HvLpm); goto FtYMO; FtYMO: BizException::throwsIfEmpty('categoryId为空', $dmpl2); goto mhvFV; Dq7k7: MemberFavoriteUtil::add(MemberUser::id(), $HvLpm, $dmpl2); goto XOgX3; n3VJD: $HvLpm = $HoLMG->getTrimString('category'); goto LFVoK; ebQgh: return Response::generateSuccess(); goto vBA_T; mhvFV: if (MemberFavoriteUtil::exists(MemberUser::id(), $HvLpm, $dmpl2)) { return Response::generateError('已经收藏'); } goto Dq7k7; vBA_T: } public function unfavorite() { goto fU6SD; bOkEc: MemberFavoriteUtil::delete(MemberUser::id(), $HvLpm, $dmpl2); goto XjqcM; LLfPv: if (!MemberFavoriteUtil::exists(MemberUser::id(), $HvLpm, $dmpl2)) { return Response::generateError('未收藏'); } goto bOkEc; jCaE1: BizException::throwsIfEmpty('categoryId为空', $dmpl2); goto LLfPv; fU6SD: $HoLMG = InputPackage::buildFromInput(); goto VJsdb; bYyqa: BizException::throwsIfEmpty('category为空', $HvLpm); goto jCaE1; KCxjO: $dmpl2 = $HoLMG->getTrimString('categoryId'); goto bYyqa; XjqcM: if ($vB6nX = $HoLMG->getTrimString('redirect')) { return Response::generate(0, null, null, $vB6nX); } goto SJh8e; SJh8e: return Response::generateSuccess(); goto NorGq; VJsdb: $HvLpm = $HoLMG->getTrimString('category'); goto KCxjO; NorGq: } }