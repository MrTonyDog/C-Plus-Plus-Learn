<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace App\Exceptions; use Exception; use Illuminate\Database\Eloquent\ModelNotFoundException; use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler; use ModStart\Core\Exception\ExceptionReportHandleTrait; use Symfony\Component\HttpKernel\Exception\HttpException; use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; class Handler extends ExceptionHandler { use ExceptionReportHandleTrait; protected $dontReport = array(HttpException::class, ModelNotFoundException::class); public function report(Exception $nT9Pr) { $this->errorReportCheck($nT9Pr); parent::report($nT9Pr); } public function render($x0ylt, Exception $ekAQT) { if ($ekAQT instanceof ModelNotFoundException) { $ekAQT = new NotFoundHttpException($ekAQT->getMessage(), $ekAQT); } return parent::render($x0ylt, $ekAQT); } protected function convertExceptionToResponse(Exception $ekAQT) { goto jS080; oHNIB: return response()->view('errors.500', array('exception' => $ekAQT), 500); goto Sm0Cm; g_QGR: if (null !== $TCUfp) { return $TCUfp; } goto K3RtV; K3RtV: if (config('env.APP_DEBUG', true)) { return parent::convertExceptionToResponse($ekAQT); } goto oHNIB; jS080: $TCUfp = $this->getExceptionResponse($ekAQT); goto g_QGR; Sm0Cm: } }