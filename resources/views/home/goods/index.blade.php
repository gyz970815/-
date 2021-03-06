@extends('home.layout.layout')
@section('title')
{{$goods->gname}}
@endsection
@section('con')
  
     {!! \App\Http\Controllers\home\shopController::getDptou() !!}
  <!-- 内容区开始 -->


  <div id="body_wrap"> 
   <div class="shop-detail"> 
    <div class="detail-primary clearfix"> 
     <div class="primary-goods"> 
      <div class="clearfix"> 
       <div class="fl goods-info goods-info-normal" id="J_GoodsInfo"> 
        <div class="info-box"> 
         <h1 class="goods-title"><span itemprop="name">{{$goods->gname}}</span></h1> 
         <div class="goods-prowrap goods-main"> 
          <div class="clearfix main-box"> 
           <dl class="clearfix property-box"> 
            <dt class="property-type property-type-origin">
             价格：
            </dt> 
            <dd class="property-cont property-cont-origin"> 
             <span id="J_OriginPrice" class="price">&yen;<font>{{$goods->price}}</font></span> 
            </dd> 
           </dl> 
           <dl class="clearfix property-box"> 
            <dt class="property-type property-type-now">
             促销价：
            </dt> 
            <dd class="property-cont property-cont-now fl"> 
             <span id="J_NowPrice" class="price">&yen;<font>{{$goods->tprice}}</font></span> 

            </dd> 
            <dd class="property-extra fr"> 
             <span class="mr10">评价： <span class="num">{{count($cout)}}</span></span> 
             <span>累计销量： <span class="num J_SaleNum">{{$goods->scnt}}</span> </span> 
            </dd> 
           </dl>


           <div id="J_ModulePromotions">
              <dl class="clearfix promotions-box">
                <dt>店铺优惠：</dt> 
                <dd class="clearfix">
                  <div class="module-promotions clearfix"> <!-- 店铺优惠列表 -->   
                    <div class="promotion-box">
                    <input type="hidden" class='sid' value='{{session("sid")}}'>
                    <input type="hidden" class='uid' value='{{session("uid")}}'>
                    @if(!empty($coupon))
                      <span class="info shopPromotion-info">{{$coupon[0]->ctname}}</span>
                      <span class="more"></span>
                        <div class="favorable-list" style="display: none;"> 
                          <ul>
                          
                          @foreach($coupon as $k=>$v)
                        
                            <div class="favorable-item fl">
                              <span class="dot fl">▪</span>
                              <span class="fl">{{$v->ctname}}</span>
                              <a href='javascript:;'>
                              <input type="hidden" value='{{$v->cid}}'>
                              <span class="fr get-btn not-get-btn J_get_promotion" pid="1hv5j3y6e" style='color:red'> 领取<div></div></span></a>
                            </div>
                          @endforeach 
                          </ul> <b></b> </div> </div> 
                      @endif
                        <!-- 满包邮 -->  </div> </dd></dl></div>
          </div> 
         </div>


         <div class="goods-prowrap goods-im"> 
          <dl class="clearfix"> 
           <dt>
            客服：
           </dt> 
           <dd>
            <div class="mogutalk_widget_btn kefu mogutalk_default" data-bid="14suk#23" data-style="default" data-from="goodsdetail_skumtalk"></div><div></div>
           </dd> 
          </dl> 
         </div> 
         <div class="goods-prowrap goods-sku" id="J_GoodsSku"> 

          <div class="content"> 
           <div class="pannel-title"> 
            <span class="choose-goods-info">选择商品信息</span> 
            <b class="J_PannelClose pannel-close"></b> 
           </div> 
           <div class="box"> 
            <dl class="style clearfix" style="display: block;"> 
             <dt>
              款式：
             </dt> 
             <dd>    
              <ol class="J_StyleList style-list clearfix">
              
               @foreach($goods_pic as $k=>$v)
                
               <li class="img" id="{{$goods->type}}"  title="真皮小白鞋">
                  <img src="{{$v->spic}}"/>
                  <b></b>
                  
                </li>
                @endforeach
                <input type='hidden' id='gid' value="{{$goods->gid}}">
              </ol> 
              <div id='div' style = 'color:red; font-size:20px'></div>
             </dd> 
            </dl> 
            <dl class="size clearfix" style="display: block;"> 
             <dt>
              尺码：
             </dt> 
             <dd> 
              <ol class="J_SizeList size-list clearfix">
             
               <li class=""  title="{{$goods->size}}">{{$goods->size}}</li>
               
              </ol> 
             </dd> 
            </dl> 
            <dl class="clearfix"> 
             <dt>
              数量：
             </dt> 
             <dd class="num clearfix"> 
              <div id="J_GoodsNum" class="goods-num fl" data-stock="2025"> 
               <span class="num-reduce"></span> 
               <input class="num-input" value="1" type="text" /> 
               <span class="num-add "></span> 
               <input type='hidden' class='hidden-val' value = "{{$goods->cnt}}">
              </div> 
              <div class="J_GoodsStock goods-stock fl" value="{{$goods->cnt}}">
               库存{{$goods->cnt}}件
              </div> 
              <div class="J_GoodsStockTip goods-stock-tip fl">
               您所填写的商品数量超过库存！
              </div> 
             </dd> 
            </dl> 
           </div> 
          </div> 
          <div class="goods-buy clearfix"> 
           <a href="javascript:;" id="J_BuyNow" class="fl mr10 buy-btn buy-now">立刻购买</a> 
           <input value="nodapei" id="dapeiShow" type="hidden" /> 
           <a href="javascript:;"  id="J_BuyCart" class="fl mr10 buy-cart buy-btn">加入购物车</a> 
           
          </div> 
         </div> 
         <div class="goods-social clearfix"> 
          <div class=" fav  item" goodsid="0" tradeitemid="18n00tc" tid="0">
           <b></b>
           <span class="fav-num">{{count($goodshouse)}}</span>
           <input type="hidden" value='{{$goods->gid}}' class='goodsgid'>
          </div> 
          <div class="share item"> 
           <b></b>分享 
           <div class="share-w clearfix"> 
            <a target="_top" href="" class="forqzone" title="关注QQ空间" rel="nofollow"></a> 
            <a target="_top" href="" class="forrenren" title="关注人人" rel="nofollow"></a> 
            <a target="_top" href="" class="forsina" title="关注sina" rel="nofollow"></a> 
            <a target="_top" href="" class="forweixin" title="关注微信" rel="nofollow"></a> 
           </div> 
          </div> 
          <div class="report">
           <a target="_top" href="" class="goods_report fl" rel="nofollow">举报</a>
          </div> 
         </div> 
         <div class="goods-extra clearfix"> 
          <div class="extra-services"> 
           <div class="fl clearfix label">
            服务承诺：
           </div> 
           <ul class="fl clearfix list"> 
            <li class="item"> <a class="link" href="http://www.mogujie.com/rule/mogu?categoryId=326&amp;ruleId=927" target="_top" title="" rel="nofollow"> <img src="/homegoods/idid_ie4timrzmq3tkzbzmezdambqgqyde_40x40.png" width="24" height="24" /> 退货补运费 </a> </li> 
            <li class="item"> <a class="link" href="http://www.mogujie.com/rule/mogu?categoryId=326&amp;ruleId=892" target="_top" title="" rel="nofollow"> <img src="/homegoods/idid_ifrtgojygu2dgzbzmezdambqhayde_40x40.png" width="24" height="24" /> 7天无理由退货 </a> </li> 
            <li class="item"> <a class="link" href="http://www.mogujie.com/rule/mogu?categoryId=326&amp;ruleId=895" target="_top" title="" rel="nofollow"> <img src="/homegoods/idid_ie3tmyjxhfrtgzbzmezdambqgayde_40x40.png" width="24" height="24" /> 全国包邮 </a> </li> 
            <li class="item"> <a class="link" href="http://www.mogujie.com/rule/mogu?categoryId=326&amp;ruleId=893" target="_top" title="" rel="nofollow"> <img src="/homegoods/idid_ifrdqobzmq3dizbzmezdambqmeyde_40x40.png" width="24" height="24" /> 72小时发货 </a> </li> 
           </ul> 
          </div> 
          <div class="extra-pay"> 
           <div class="fl clearfix label">
            支付方式：
           </div> 
           <div class="fl list list-nomaibei"></div> 
          </div> 
         </div> 
        </div> 
       </div> 
       <div class="fl goods-topimg" id="J_GoodsImg"> 
        <div class="big-img"> 
         <img id="J_BigImg" src="{{$goods->gpic}}" alt="{{$goods->gdesc}}" width="400" /> 
        </div> 
        <div id="J_SmallImgs" class="small-img">
          <div class="box">
              <div class="list">
                <ul class="clearfix">
                  @foreach($goods_pic as $k=>$v)
                  <li class="tupian" value="{{$v->spic}}"  style='float:left; margin:0px 10px; center'>

                    <img src="{{$v->spic}}" class='xiaotu' width='60px' height='60px'><i></i>
                  </li>
                  @endforeach
      
                </ul>
              </div>
          </div>
          <a class="left-btn arrow-btn" href="javascript:;"></a>
          <a class="right-btn arrow-btn" href="javascript:;"></a>
      </div>
        <div id="J_SmallImgs" class="small-img" style="display: none;"> 
         <div class="box"> 
          <div class="list"> 
           <ul class="clearfix" style="text-align: center;"></ul> 
          </div> 
         </div> 
         <a class="left-btn arrow-btn" href="javascript:;"></a> 
         <a class="right-btn arrow-btn" href="javascript:;"></a> 
        </div> 
       </div> 
      </div> 
     </div> 
     <div class="primary-slide"> 
      <div class="goods-recommend" id="J_ModuleLook" data-ptp="_rechot">
       <!-- 热卖推荐 -->
       <p class="title">
        <s></s><span>热卖推荐</span></p>
       <div class="list"> 
        <div class="box"> 
         <ul> 
          @foreach($allgood as $k=>$v)
         @foreach($v as $kk=>$vv)
          
          <li> <a href="/home/goods/index?gid={{$vv->gid}}" target="_top"> <img src="{{$vv->gpic}}" data-iids="1k4yi34" data-indexs="0" data-acms="3.mce.1_4_1k4yi34.5124..j8Sq7N7y7lZ.lc_201" class="loggered" width="120" /> </a><span>{{$vv->gname}}</span> </li> 
        @endforeach
        @endforeach
      
         </ul> 
        </div>
       </div>
      </div> 
     </div> 
    </div> 
    <div class="detail-content "> 
     <!-- 顶部 --> 
     <div class="col-top"> 
      <!-- 搭配购 --> 
      <div class="module-dapei" id="J_ModuleDapei"></div> 
     </div> 
     <!-- 主体 --> 
     <div class="col-main"> 
      <!-- 模块标签页 --> 
      <div class="module-tabpanel" id="J_ModuleTabpanel"> 
       <!-- 选项栏 --> 
       <div class="tabbar-box"> 
        <ul class="tabbar-list clearfix" id='option'> 
         <li data-panels="graphic,recommend" data-hasnav="true" class="tab-graphic xiangqing selected"> 
            <a href="javascript:;">商品详情</a>
         </li> 
         <li data-panels="rates" data-hasnav="false" class='leiji '> 
            <a href="javascript:;">累计评价<em>{{count($cout)}}</em></a> 
          </li> 
         <li data-panels="recommend" data-hasnav="false" class='tonglei'>
             <a href="javascript:;">本店同类商品</a>
         </li> 
         <li class="qrcode"> 
          <div class="qrcode-togger">
           手机扫码下单
           <!-- <br />快捷支付立减五元 -->
          </div> 
          <div class="qrcode-pic">
           <img src="/homegoods/qrcode" />
          </div> <i class="qrcode-mini"></i> <i class="qrcode-arrow"></i> </li> 
        </ul> 
       </div> 
       <div class=""> 
        <div class="bg-right"></div> 
        <div class="bg-left"></div> 
       </div> 
       <div class="tabbar-occupying"></div> 
       <!-- 选项页 --> 
       <div class="panel-box"> 
            <!-- 图文详情 --> 
            <div class="module-panel module-graphic " id="J_ModuleGraphic">
             <!-- 图文详情 -->
             <!--     注：PHP模板走的是本地模板文件：views/modules/module-graphic.php-->
             <!-- 商品描述 --> 
             <div id="J_Graphic_desc"> 
              <div class="panel-title"> 
               <h1>商品描述</h1> 
              </div> 
              <!-- 描述 --> 
              <div class="graphic-text">
               {{$goods->gdesc}}
              </div> 
             </div>
             <!-- 产品参数 --> 
             <div id="J_Graphic_产品参数"> 
              <div class="panel-title"> 
               <h1>产品参数</h1> 
              </div> 
              <!-- 产品参数 --> 
              <div class="graphic-block"> 
               <!-- 描述 --> 
               <!-- 表格 --> 
               <table class="parameter-table" id="J_ParameterTable"> 
                <tbody> 
                 <tr class=""> 
                  <td>颜色: 白色</td> 
                  <td>适用场地: 其他,地板,硬地,野外,山区</td> 
                  <td>装饰样式: 无</td> 
                 </tr> 
                 <tr class=""> 
                  <td>帮面材质: 人造革</td> 
                  <td>视觉效果: 无特殊效果</td> 
                  <td>风格: 运动,韩系,街头（潮人）</td> 
                 </tr> 
                 <tr class=""> 
                  <td>鞋底材质: 橡胶底</td> 
                  <td>性别: 女子</td> 
                  <td>功能: 轻便,透气,耐磨,吸汗,其他</td> 
                 </tr> 
                 <tr class=""> 
                  <td>鞋帮高度: 高帮</td> 
                  <td>鞋面材质: 人造革/PU</td> 
                  <td>闭合方式: 系带</td> 
                 </tr> 
                </tbody> 
               </table> 
              </div> 
             </div>
             <!-- 模块级别 --> 
             <div class="graphic-block"> 
              <!-- 图片列表 --> 
              <div id="J_Graphic_穿着效果"> 
               <div class="panel-title"> 
                <h1>穿着效果</h1> 
               </div> 
               @if(!empty($bigpic))
              @foreach($bigpic as $k=>$v)
              
               <div class="graphic-pic"> 
                <div class="pic-box" style="padding-bottom: 111.714%;"> 
                 <img class="lazy" style="left: -320px; display: block;" src="{{$v->bpic}}" width='600px'; height='800px' /> 
                </div> 
               </div>
               <br> 
               @endforeach
               @endif
              </div> 
             </div>
             <!-- 尺码说明 --> 
             <div id="J_Graphic_尺码说明"> 
              <div class="panel-title"> 
               <h1>尺码说明</h1> 
              </div> 
              <!-- 尺码说明 --> 
              <div class="graphic-block"> 
               <!-- 描述 --> 
               <div class="graphic-text">
                跟高2.5厘米 正常鞋码~
               </div> 
               <!-- 表格 --> 
               <table class="size-table"> 
                <thead> 
                 <tr> 
                  <td>尺码</td> 
                  <td>脚长</td> 
                 </tr> 
                </thead> 
                <tbody> 
                 <tr> 
                  <td>35</td> 
                  <td>225</td> 
                 </tr> 
                 <tr> 
                  <td>36</td> 
                  <td>230</td> 
                 </tr> 
                 <tr> 
                  <td>37</td> 
                  <td>235</td> 
                 </tr> 
                 <tr> 
                  <td>38</td> 
                  <td>240</td> 
                 </tr> 
                 <tr> 
                  <td>39</td> 
                  <td>245</td> 
                 </tr> 
                 <tr> 
                  <td>40</td> 
                  <td>250</td> 
                 </tr> 
                </tbody> 
               </table> 
               <!-- 提醒 --> 
               <div class="size-text">
                ※ 以上尺寸为实物人工测量，因测量当时不同会有1-2cm误差，相关数据仅作参考，以收到实物为准。
               </div> 
              </div> 
             </div>
            </div> 
            <!-- 累计评价 --> 
            <div class="module-panel module-rates ui-none" id="J_ModuleRates"> 
             <!-- 买家评价 --> 
             <div id="J_RatesBuyer"> 
              <div class="panel-title rates-title"> 
               <h1>买家评价</h1> 
              </div> 
              <!-- 买家评价 --> 
              <div class="rates-buyer"> 
               <!-- 评价分数 --> 
               <div class="comment-info"> 
                <ul class="clearfix"> 
                 <li class="score"> <span class="comment-star"><b style="width: 77px;"></b></span> <span class="numbox"> <b class="num-v">4.67</b><span class="num-s">分</span> </span> </li> 
                 <li> 
                  <div class="title">
                   价格合理
                  </div> 
                  <div class="cont"> 
                   <span class="comment-star"><b style="width: 86px;"></b></span> 
                   <span class="num-v">5.00</span> 
                  </div> </li> 
                 <li> 
                  <div class="title">
                   商品质量
                  </div> 
                  <div class="cont"> 
                   <span class="comment-star"><b style="width: 77px;"></b></span> 
                   <span class="num-v">4.34</span> 
                  </div> </li> 
                 <li class="last"> 
                  <div class="title">
                   描述相符
                  </div> 
                  <div class="cont"> 
                   <span class="comment-star"><b style="width: 77px;"></b></span> 
                   <span class="num-v">4.68</span> 
                  </div> </li> 
                </ul> 
               </div> 
               <div class="comment-content"> 
                <div class="tags clearfix"> 
                 <div class="list  open "> 
                  <a href="javascript:;" class="best" data-emotion="positive" data-property="质量">质量很好 (8)</a> 
                  <b>|</b> 
                  <a href="javascript:;" class="best" data-emotion="positive" data-property="服务">卖家服务很好 (5)</a> 
                  <b>|</b> 
                  <a href="javascript:;" class="best" data-emotion="positive" data-property="款式">款式好 (3)</a> 
                  <b>|</b> 
                 </div> 
                </div> 
                <!-- 导航 --> 
                <div class="nav clearfix"> 
                 <div class="comment-sort"> 
                  <input class="J_CommentSort" data-type="1" id="J_CommentSortDefault" name="commentSort" checked="checked" type="radio" />
                  <label for="J_CommentSortDefault"> 默认排序</label> 
                 </div> 
                 <a href="javascript:;" data-type="all" class="c">全部评价（<?php echo count($cout);?>）</a> 
                 
                </div> 
                <!-- 列表 --> 
                <div id="J_RatesBuyerList" class="comments">
                 <!--详情页交易评价列表-->
                 @if($cout)
                @foreach($cout as $k=>$v)
                 <div class="item clearfix" data-id="17ine5y"> 
                  <div class="info"> 
                   <div class="info-w"> 
                    <!-- 评价用户、时间 --> 
                    <div class="info-t clearfix"> 
                     <span class="name">{{$v->uname}}</span> 
                     <span class="date"><?php echo date('Y-m-d H:i:s',$v->ptime);?></span> 
                    </div> 
                    <!-- 评价内容 --> 
                    <div class="info-m">
                     {{$v->cout}}
                    </div> 
                    <!-- 商品属性 --> 
                    <div class="info-b clearfix"> 
                     <p> <span class="sku-choose">{{$goods->size}}</span> <span class="sku-choose">{{$goods->type}}</span> </p> 
                     <p> </p> 
                     <!-- <a href="http://www.mogujie.com/apps" target="_blank" class="from-ios shop-detail-icons comment-mt">来自iOS客户端</a> --> 
                     <!-- <a href="http://www.mogujie.com/apps" target="_blank" class="from-android shop-detail-icons comment-mt">来自Android客户端</a> --> 
                    </div> 
                    <!-- 晒图 S --> 
                    <!-- 晒图 E --> 
                    <!-- 商家回复输入 --> 
                    <div class="info-l"></div> 
                    <!-- 追加评价 --> 
                    
                    <div class="info-k show-img"> 
                     <ul class="list clearfix"> 
                      <li> 
                      <!-- 添加评论图片 -->
                       @if($v->pprice ==null)
                        @else
                       <div class="img-box"> 
                        <span><img src="{{$v->pprice}}" width="40" height='40'/> </span>
                       
                       </div>
                         @endif 
                        </li> 
                     </ul> 
                     <div class="big-img  liujingjing" style="display: none;">
                     	<div class="img-box">
                     		<span> 
                     			<img src="{{$v->pprice}}" height="400">
                     			</span>
                     		</div>
                     	</div>



                     <div class="big-img"> 
                      <span> <img src="" height="400" /> </span> 
                     </div> 
                    </div> 
                   </div> 
                  </div> 
                  <div class="face"> 
                   <img src="/homegoods/idid_ifrtcnbzgbswgntfguzdambqhayde_160x160.jpg_64x64.jpg" /> 
                  </div> 
                 </div>
                 @endforeach
                 @else
                 还没有评价哦!!!
                 @endif
                
                </div> 
               </div> 
              </div> 
             </div> 
             <!-- 成交记录 --> 
             <div id="J_RatesOrder"> 
              <div class="panel-title rates-title"> 
               <h1>成交记录</h1> 
              </div> 
              <!-- 成交记录 --> 
              <div class="rates-order"> 
               <!-- 列表 --> 
               <div class="sale-list" id="J_RatesOrderList"></div> 
              </div> 
             </div> 
            </div> 
            <!-- 本店同类商品 --> 
            <div class="module-panel module-recommend ui-none" id="J_ModuleRecommend">
             <!-- 本店同类商品 -->
             <!--     注：PHP模板走的是本地模板文件：views/modules/module-recommend.php-->
             <!-- 本店同类商品列表 -->
             <div id="J_RecommendList"> 
              <div class="panel-title recommend-title"> 
               <h1>本店同类商品</h1> 
              </div> 
              <!-- 本店同类商品列表 --> 
              <div class="recommend-list"> 
               <!-- 列表 --> 
               <ul> 
                @foreach($allgood as $k=>$v)
               @foreach($v as $kk=>$vv)
                <li> 
                    <a class="pic" href="/home/goods/index?gid={{$vv->gid}}" target="_top"> 
                      <img class="lazy" src="{{$vv->gpic}}" data-iids="17s71zc" data-indexs="0" data-acms="3.mce.1_4_17s71zc.5148..j8Sq7N7zkCT.lc_201" style="display: block;" /> 
                    </a>
                    <a class="title" href="/home/goods/index?gid=" target="_top">
                    </a> 
                 <div class="info"> 
                  <div class="price"> 
                   <em class="price-u">&yen;</em> 
                   <span class="price-n">{{$vv->price}}</span> 
                  </div> 
                  <div class="fav"> 
                   <em class="fav-i"></em> 
                   <span class="fav-n">{{$vv->cnt}}</span> 
                  </div> 
                 </div> </li> 
               @endforeach
               @endforeach
               </ul> 
              </div> 
             </div>
            </div> 
       </div> 
      </div> 
     </div> 
     <!-- 侧边栏 --> 
     <div class="col-sidebar"> 
      <!-- 店铺模块 --> 
      <div class="module-shop" id="J_ModuleShop"> 
       <!-- 店铺信息 --> 
       <div class="ui-box shop-info"> 
        <h3 class="ui-hd shop-hd "> 
         <div class="shop-name"> 
          <a class="text text-hasim" href="">风景在你左右 
           <div class="mogutalk_widget_btn  mogutalk_pc" data-bid="14suk#23" data-style="pc" data-from="goodsdetail_skumtalk"></div> </a> 
         </div> </h3> 
        <div class="shop-occupying"></div> 
        <div class="ui-bd"> 
         <div class="shop-evaluate"> 
          <ul> 
           <li> <p class="text">描述</p> <p class="num-def ">4.67</p> </li> 
           <li> <p class="text">价格</p> <p class="num-def ">4.66</p> </li> 
           <li> <p class="text">质量</p> <p class="num-def ">4.64</p> </li> 
           <li> <p class="text">服务</p> <p class="num-def ">4.68</p> </li> 
          </ul> 
         </div> 
         <div class="shop-btns"> 
          <a rel="nofollow" class="J-shop-follow shop-follow  btn-fav " href="javascript:;" data-shopid="14suk"> 收藏店铺 </a> 
          <a class="btn-goto" href="http://shop.mogujie.com/14suk">进入店铺</a> 
         </div> 
         <div class="shop-search"> 
          <i class="line"></i> 
          <form action="" method="get" id="J_ShopSearch"> 
           <input class="inptxt" name="q" value="" type="text" /> 
           <input class="btn btn_warning" value="店内搜索" type="submit" /> 
          </form> 
         </div> 
         <div class="shop-provide"> 
          <i class="line"></i> 
          <i class="arrow"></i> 
          <a class="pic" href="javascript:;"> <img class="img-lazyload" src="/homegoods/upload_ie2dsmbsmyydcmtbgmzdambqgiyde_150x26.png" width="150" height="26" /> </a> 
         </div> 
        </div> 
       </div> 
      </div> 
      <!-- 分类模块 --> 
      <div class="module-classify" id="J_ModuleClassify"> 
       <!-- 分类信息 --> 
       <div class="ui-box classify-info"> 
        <h3 class="ui-hd">本店分类</h3> 
        <div class="ui-bd"> 
         <!-- 列表 --> 
         <ul class="classify-list"> 
          <li> <a href="/home/goods/index">全部商品</a> </li> 
          
         @foreach($paths as $k=>$v)

               
              
          <li class="category-link"> 
              <a href="/home/list/index?tid={{$v->tid}}">{{$v->tname}}</a> 
          </li> 
         
          @endforeach
          
         </ul> 
        </div> 
       </div> 
      </div> 
      <!-- 看了又看模块 --> 
      <!-- 设置隐藏域保存sid -->
      <input type="hidden" name="sid" value="{{session('sid')}}">
      <div class="module-repeat" id="J_ModuleRepeat">
       <!-- 看了又看 -->
       <!--     注：PHP模板走的是本地模板文件：views/modules/module-repeat.php-->
       <!-- 看了又看信息 -->
       <div class="ui-box repeat-info"> 
        <h3 class="ui-hd">看了又看</h3> 
        <div class="ui-bd"> 
         <!-- 列表 --> 
         <ul class="repeat-list"> 
         <style>
           .price {width: 46%;}
           .module-repeat .repeat-info .repeat-list li .fav{font-size:11px;}
          </style>
         @foreach($allgood as $k=>$v)
         @foreach($v as $kk=>$vv)
          <li data-id="18lw87k">
           <a class="pic" href="/home/goods/index?gid={{$vv->gid}}" target="_top"> 
           <img class="lazy loggered" src="{{$vv->gpic}}"  data-iids="18lw87k" data-indexs="0" data-acms="3.mce.1_4_18lw87k.5123..Ay9q7N7znA8.lc_201" style="display: block;" /> </a> 
           <p>{{$vv->gname}}</p>
           <a class="title" href="/home/goods/index?gid={{$vv->gid}}" target="_top"></a> 
           <div class="info"> 
            <div class="price"> 
             <em class="price-u">&yen;</em> 
             <span class="price-n">{{$vv->price}}</span> 
            </div> 
            <div class="fav"> 
             <em>库存</em> 
             <span class="fav-n">{{$vv->cnt}}</span> 
            </div> 
           </div> </li> 
          @endforeach
          @endforeach
         </ul> 
        </div>
       </div>
      </div> 
     </div> 
     <!-- 扩展栏 --> 
     <div class="col-extra"> 
      <i class="bor-line bor-r"></i> 
      <i class="bor-line bor-b"></i> 
      <i class="bor-line bor-l"></i> 
      <!-- 购物车模块 --> 
      <div class="module-cart" id="J_ModuleCart"> 
       <div class="ui-box cart-info"> 
        <div class="ui-hd cart-hd"> 
         <a class="cart-name" id="cart" href="javascript:;"> <span><i></i>加入购物车</span> </a> 
        </div> 
        <div class="cart-occupying ui-hide"></div> 
       </div> 
      </div> 
      <!-- 右侧子导航模块 --> 
     </div> 
    </div> 
   </div> 
   <!-- 购物车弹框弹框 -->
    <div id="J_AddCartBox" class="light_box" style="left:732px; top: 20px; display: none; position: fixed;z-index:9999">
      <iframe frameborder="0" scrolling="no" class="lb_fix" style="width: 574px; height: 437px;"></iframe>
          <tr>
            <td>
              <div class="lb_bd" style="padding: 0px; background: none;">
                <div class="content">
                  <div class="head clearfix">
                    <a href="javascript:;" class="J_Close close-btn">关闭</a>
                      <span class="arrow_right"></span>
                  </div>
                  <div class="body">
                    <div id="body_wrap">
        <div class="module-add-cart">
    <div class="module-cart-body">
      <!--头部插入-->
      <link media="all" href="/soncss/index.css" type="text/css" rel="stylesheet">
      <div class="module-cart-box"><p class="mac-mb10"><span class="mac-success-txt module-cart-icons">已将商品添加到购物车</span></p><p><a href="/cart/cart" target="_top" class="mac-go-cart module-cart-icons">去购物车结算</a></p></div><div class="module-cart-more" data-ptp="_recaddcart">
        <div class="mcm-head clearfix">
          <div class="mcm-title">购买过该商品的菇凉还购买了：</div>
          <div class="mcm-tab"></div>
        </div>
        <div class="mcm-list">
          <ul class="clearfix">
            <!--推荐信息插入-->
            @foreach($arr as $k=>$v)
          <li>
            <div class="mcm-info">
              <a href="/home/goods/index?gid={{$v->gid}}" target="_top" class="mcm-pic" style="height: 165px;">
                <img src="{{$v->gpic}}" title="{{$v->gname}}">
              </a>
              <a href="/home/goods/index?gid={{$v->gid}}" target="_top" class="mcm-name">{{$v->gname}}</a>
              <span class="mcm-price">{{$v->price}}</span></div></li>
          @endforeach
          </ul>
        </div>
      </div>
    </div>
</div>
<input name="stockId" id="stockId" value="1mygkyc" type="hidden">
  </div>
<div style="visibility: hidden; position: absolute;" id="userdata_el"></div>
</div>
</div></div></td></tr></div>
  <input type="hidden" value='{{$shop->sid}}' id='sid' class='shopsid'>
</div>
@endsection
@section('js')
<script type="text/javascript" src="/homecss/shopcss/yaxicss/js/yaxi.js"></script>
<script type="text/javascript">
  //鼠标移入事件
    
    $('.all').mouseover(function()
    { 
      $('.slideer').css('display','block');


    })
    
    //鼠标移出事件
    $('.all').mouseout(function()
    { 
      $('.slideer').css('display','none');
    })


    //联系客服
    $('.kefu').dblclick(function()
    {
      $(this).next().html('客服热线:00000');
      return false;
    })


    $('.kefu').click(function()
    {
      $(this).next().html('');
      return false;
    })
    


    //选择商品样式小图
    $('.img').click(function()
    {
      $(this).addClass('c').siblings().removeClass('c');
      var xiaotu = $('.c img')[0].src;
     
      $('#J_BigImg').attr('src',xiaotu);
    })


    //选择尺码
    $('.size-list').children().click(function()
    {
      $(this).addClass('c').siblings().removeClass('c');
    })


     


      //商品数量
      //加
      $('.num-add').click(function()
      {
        var val = $(this).prev().val();
        val = Number(val)+1;
        $(this).prev().val(val);
       var cnt = $('.hidden-val').val();
        if(val > cnt){
          $('.goods-stock-tip').css('display','block');
        }else{
          $('.goods-stock-tip').css('display','none');
        } 
      })
      //减
      $('.num-reduce').click(function()
      {
        var val = $(this).next().val();


        val = Number(val)-1;
        if(val<=1){
          val = 1;
          $(this).next().val(val);
        }


        $(this).next().val(val);
        var cnt = $('.hidden-val').val();
        if(val < cnt){
         
          $('.goods-stock-tip').css('display','none');
        } 
      })


      //input修改
      $('.num-input').focus(function()
      {
        var val = $(this).val();
      })


      $('.num-input').blur(function()
      {
        var val = $(this).val();
        $(this).val(val);
        var cnt = $('.hidden-val').val();
        if(val > cnt){
          $('.goods-stock-tip').css('display','block');
        }else{
          $('.goods-stock-tip').css('display','none');
        } 
      })
      
      //立即购买
      $('#J_BuyNow').click(function()
      {
         

        //商品数量
        var num = $('.num-input').val();
        
        //商品id
        var gid = $('#gid').val();
       
        //获取价格  促销价
        var nowp= $('#J_NowPrice').find('font').html();
       
        //获取 原价
        var oldp= $('#J_OriginPrice').find('font').html();
        
        //获取款式
        var type  = $('.style-list').find('.c').attr("ID");
        //获取尺码
       
        var size = $('.size-list').find('.c').html();
        
        //获取店铺id
        // $('#sname').attr('sid');
        var sid =  $('#sid').val();
      
       if(type && size){
        $('#div').html('');
        $.get('/cart',{num:num,gid:gid,nowp:nowp,oldp:oldp,type:type,size:size,sid:sid},function(data){
            if (data==1) {
              location.href='http://mg.cn/cart/cart';
            }else{
              alert('请您先登录再来购买');
            }
              
          },'json');
      
       }else{
        $('#div').html('请选择尺码和款式');
      }

      })


      
      //加入购物车
     $('#J_BuyCart').click(function()
      {
        //获取各个参数
        // var img = $('.style-list').find('.c').val();
        // var size = $('.size-list').find('.c').val();
       
        //商品数量
        var num = $('.num-input').val();
        
        //商品id
        var gid = $('#gid').val();
       
        //获取价格  促销价
        var nowp= $('#J_NowPrice').find('font').html();
       
        //获取 原价
        var oldp= $('#J_OriginPrice').find('font').html();
        
        //获取款式
        var type  = $('.style-list').find('.c').attr("ID");
        //获取尺码
       
        var size = $('.size-list').find('.c').html();
        
        //获取店铺id
        // $('#sname').attr('sid');
        var sid =  $('#sid').val();
      
       if(type && size){
        $('#div').html('');
        $.get('/cart',{num:num,gid:gid,nowp:nowp,oldp:oldp,type:type,size:size,sid:sid},function(data){
            if (data==1) {
              $('#J_AddCartBox').fadeIn(1000);
            }else{
              alert('请您先登录再来购买');
            }
              
          },'json');
      
       }else{
        $('#div').html('请选择尺码和款式');
      }
       
     })    


        
     // $('#cart').click(function()
     //  {
        
     //    var img = $('.style-list').find('.c').val();
     //    var size = $('.size-list').find('.c').val();
     //    var num = $('.num-input').val();
     //    var gid = $('#gid').val();
        
     //    $.get('/home/cart/add',{gid:gid,num:num,size:size,img:img},function(data){
     //        if (data){
     //            window.location.href='/home/order/index';
     //          }else{
     //            $('#div').html('请选择尺码和款式');
     //          }
     //    },'json');
     //  })


    //选项卡操作
     $('.xiangqing').click(function()
     {
        $(this).addClass('selected');
        $('.leiji').removeClass('selected');
        $('.tonglei').removeClass('selected');
        $('#J_ModuleGraphic').removeClass('ui-none');
        $('#J_ModuleRates').addClass('ui-none');
        $('#J_ModuleRecommend').addClass('ui-none');
     })


     $('.leiji').click(function()
     {
        $(this).addClass('selected');
        $('.xiangqing').removeClass('selected');
        $('.tonglei').removeClass('selected');
         $('#J_ModuleGraphic').addClass('ui-none');
        $('#J_ModuleRates').removeClass('ui-none');
        $('#J_ModuleRecommend').addClass('ui-none');
     })


     $('.tonglei').click(function()
     {
        $(this).addClass('selected');
        $('.xiangqing').removeClass('selected');
        $('.leiji').removeClass('selected');
        $('#J_ModuleGraphic').addClass('ui-none');
        $('#J_ModuleRates').addClass('ui-none');
        $('#J_ModuleRecommend').removeClass('ui-none');
     })


     //扫码付款
     $('.qrcode').mouseover(function()
     {
        $('.qrcode-pic').css('display','block');
     });

      $('.qrcode').mouseout(function()
     {
        $('.qrcode-pic').css('display','none');
     })


      //修改商品图片
      $('.xiaotu').mouseover(function()
      {
        var xiaotu = $(this)[0].src;
        $('#J_BigImg').attr('src',xiaotu);
      })


      //弹框关闭
      $('.J_Close').click(function()
      {
        $('#J_AddCartBox').fadeOut(1000);
      })


      //收藏店铺
      $('.J-shop-follow').click(function()
      {
        var sid = $('.shopsid').val();
        
        var sc = $(this);

        $.get('/home/house/add',{sid:sid},function(data)
        {
          if(data){
            sc.html('已收藏').removeClass('header-icons');
          }else{
            alert('亲,未登录哦');
          }
        },'json');
      })


      //收藏商品
      $('.fav').click(function()
      {
          var gid = $('.goodsgid').val();
          var sc = $('.fav-num');
           $.get('/home/house/goodsadd',{gid:gid},function(data)
          {
            if(data){
              var ddd = sc.html();
              var sss = Number(ddd)+1;
              
              sc.html(sss)
            }else{
              alert('亲,已经收藏过了');
            }
          },'json');
      })

      //优惠券
      $('#J_ModulePromotions').mouseover(function()
      {
        $('.favorable-list').css('display','block');
      })

      $('#J_ModulePromotions').mouseout(function()
      {
        $('.favorable-list').css('display','none');
      })

      //领取优惠券
      $('.J_get_promotion').click(function()
      {
        //获取sid 
        var sid = $('.sid').val();
        //获取uid
        var uid = $('.uid').val();
        //获取cid
        var cid = $(this).prev().val();
        var inp = $(this);
        var iii = $('.J_get_promotion');
        $.get('/home/goods/coupon',{sid:sid,uid:uid,cid:cid},function(data)
          {
              if(data==2){
                alert('已经领取过了');
              }else{
                if(data){
                  inp.html('已领取');
                  iii.scc('color','block');
                }else{
                  alert('请先登录');
                }
              }
          },'json');
      })

      //评价图片预览
		var a = 1;
      $('.img-box').click(function()
      {	
      		
      		if(a ==1){
      			$(this).parent().parent().next().css('display','block');
      			 a = 2;
      		}else{
      			$(this).parent().parent().next().css('display','none');
      			a=1;
      		}

      })

    
      
</script>
</script>
@endsection