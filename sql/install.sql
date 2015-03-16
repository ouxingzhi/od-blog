-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 03 月 15 日 23:46
-- 服务器版本: 5.5.22
-- PHP 版本: 5.3.10-1ubuntu3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `od_blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `od_article`
--

CREATE TABLE IF NOT EXISTS `od_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `entitle` varchar(150) NOT NULL DEFAULT '' COMMENT '英文标题',
  `image` varchar(200) NOT NULL DEFAULT '' COMMENT '图片',
  `kind` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '分类',
  `summary` varchar(400) NOT NULL DEFAULT '' COMMENT '描述',
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建用户id',
  `cdate` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `edate` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序值',
  `body` text COMMENT '正文',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章表' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `od_article`
--

INSERT INTO `od_article` (`id`, `title`, `entitle`, `image`, `kind`, `summary`, `uid`, `cdate`, `edate`, `sort`, `body`) VALUES
(3, '第一篇博文', 'the first article', '', 4, 'the article', 0, 1425808375, 1426418063, 0, '<p>吴小莉：两高的报告很受关注，对其中最高人民法院的工作报告要如何解读，我们华闻直播室邀请到最高人民法院的新闻发言人孙军工孙局长。欢迎孙局长来我们的节目。</p>\r\n\r\n<p>孙军工：很高兴到凤凰卫视来。</p>\r\n\r\n<p>主持人：我们知道，法治是这几年热议的一个话题，尤其是十八届四中全会专题报告也提到要全面推进依法治国，把依法治国提到了一个新的高度。在依法治国方面，我们法院系统可以发挥什么样的作用？</p>\r\n\r\n<p>孙军工：应该说这是一个很大的问题，但是我想，就是具像一点来说，我觉得至少在三个方面可以发挥作用：</p>\r\n\r\n<p>一个方面，推进依法治国，人民法院的首要职责就是要保证准确地实施国家的宪法和法律，保证法治的统一。包括在办理具体的案件的时候，在履行审判、执行工作职责的时候，要准确地把宪法法律规定的精神，完完整整的体现出来；</p>\r\n\r\n<p>另外一个方面，就是要公正严格执法，维护司法公正。让人民群众在每一个司法案件当中都能感受到公平正义，这是人民法院的一个工作目标，也是一个价值追求，要通过每一起案件的审判执行，让人民群众感受到公平和正义，这才能够凝聚推进法治建设的正能量；</p>'),
(4, '四川西昌两千岁树王再度病危 此前已抢救三次', 'sichuanxichangliangqiansuishuwangzaidubingwei-ciqianyiqiangjiusanci', '', 4, '', 0, 1426337791, 1426418049, 0, '<p><img alt="“九龙汉柏”资料图" src="http://img6.cache.netease.com/cnews/2015/3/14/20150314040337fa140_550.jpg" /><br />\r\n&ldquo;九龙汉柏&rdquo;资料图</p>\r\n\r\n<p>正在等待救治的&ldquo;九龙汉柏&rdquo;情况不容乐观，它的&ldquo;老伙伴们&rdquo;近况又如何呢？植树节前夕，记者进行了探访。</p>\r\n\r\n<p><strong>青城山天师洞千年银杏树</strong></p>\r\n\r\n<p>相传该树是东汉张天师亲手种植，树龄1800岁。青城山前山管理处人员说，这棵树享受的是&ldquo;国宝级&rdquo;待遇：连修剪树枝都要上报园林部门批准。工作人员介绍，去年发现有白蚁啃食树木，后来找了专业团队进行杀虫处理，目前古银杏树长势良好。</p>\r\n\r\n<p><strong>天台山千年红豆杉</strong></p>\r\n\r\n<p>经专家考察，天台山正天台景点金龙河边的红豆杉树至少有1500年树龄。天台山风景区管委会副主任吴思麟介绍，景区专门在红豆杉周边建了木栅栏防止被人破坏，另外，红豆杉旁边本有一间房子，&ldquo;近期将把房子拆除，为红豆杉营造良好的生长环境。&rdquo;</p>\r\n\r\n<p><strong>都江堰&ldquo;张松银杏&rdquo;</strong></p>\r\n\r\n<p>离堆公园内的&ldquo;张松银杏&rdquo;传说为三国名士张松手植。令人称奇的是，它本为雄株，千年来未结一果，但自2000年起每年都硕果累累。园林部门介绍，古银杏长势良好，已被严格保护起来。</p>\r\n\r\n<p>在西昌邛海湖畔的泸山光福寺内，生长着一棵神秘的&ldquo;九龙汉柏&rdquo;，它已经活了2000多岁了，被称为&ldquo;巴蜀树王&rdquo;、&ldquo;天府树王&rdquo;。但从2010年开始，&ldquo;树王&rdquo;枝桠出现萎缩枯死的状态，生命危在旦夕，西昌市风景园林绿化管理处曾对它进行过三次紧急抢救。</p>\r\n\r\n<p>但是，毕竟年龄太大。今年以来，树王又病了，而且病得很严重。3月11日，在植树节前夕，西昌市风景园林绿化管理处紧急从省林业厅及川农大请来专家，现场为&ldquo;九龙汉柏&rdquo;把脉开方，尽力延长它的生命。</p>\r\n\r\n<p><strong>生命垂危/ 今年&ldquo;只有两小枝露出新绿&rdquo;</strong></p>\r\n\r\n<p>昨日上午，在泸山光福寺内，游人如织。在大雄宝殿东侧，这棵编号XC0038的古树看上去满目疮痍，虬枝盘曲，树皮已经完全脱落，硕大而干枯的柏树枝干尽情地裸露在烈日下，树干枝条末端零星地生长着几簇黄黄的柏树叶。尽管古树呈枯死的状态，还是吸引了不少游客拍照留念。&ldquo;真是太奇特了，还是第一次看见这么大的古树。&rdquo;站在树下，来自成都的游客张林啧啧称奇，&ldquo;生命真是太顽强了！&rdquo;</p>\r\n\r\n<p>据西昌市风景园林绿化管理处有关负责人介绍，这棵古树栽植于汉代，相传为西汉惠帝所植，经鉴定距今已有2000多年历史，享有&ldquo;巴蜀树王&rdquo;之美誉。全树高12米，树围8.5米，有三个较大的主干，主干和主枝呈螺旋状扭曲向上生长，犹如多条巨龙盘栖树上，故又被称为&ldquo;九龙汉柏&rdquo;。1993年，&ldquo;九龙汉柏&rdquo;被列入四川省十大古树名木，属于受国家一级保护的名木古树。2004年，这棵古树又被省林业厅等部门评为&ldquo;天府树王&rdquo;。</p>\r\n\r\n<p>&ldquo;往年这个时候，树王应该长新枝叶了，可是今年以来，只有两小枝露出零星的新绿。&rdquo;据维护寺内树木的工人介绍，原本有生命迹象的几根桠枝，不仅没有长出新叶，反而枯死了，这棵&ldquo;九龙汉柏&rdquo;再次病危。每年10月到次年5月，是西昌的干季，雨水少。考虑到古树可能缺水，寺庙还安装了一根水管到枝桠上，每天按时给古树喷水。</p>\r\n\r\n<p><strong>专家把脉/ 补充营养、清除白蚁&hellip;&hellip;此前已经三次抢救</strong></p>\r\n\r\n<p>&ldquo;九龙汉柏&rdquo;是光福寺的镇寺之宝。记者昨日看到，在树的底部枝干上，有许多人为的刀砍斧凿的痕迹。据光福寺方丈释照洲大师介绍，&ldquo;九龙汉柏&rdquo;和光福寺在&ldquo;文革&rdquo;时曾经遭遇浩劫，当时以为&ldquo;九龙汉柏&rdquo;将因此死亡，令人意外的是，第二年春天，它又发出了新叶，并逐渐恢复元气。</p>\r\n\r\n<p>由于树龄太大，加之历史上人为的伤害和各种病虫害，&ldquo;九龙汉柏&rdquo;历经2000多年的风雨沧桑后，虽然顽强地活了下来，但其生命的特征一直向着萎缩枯死的状态发展。2010年开始，这棵古树枝桠枯萎得特别厉害，仅在南侧和西北两侧树冠有少量枝叶。当时，光福寺住持非常着急，找到西昌市风景园林绿化管理处，请求援助抢救古树。&ldquo;虽然想了很多办法，但是效果还是有限。&rdquo;</p>\r\n\r\n<p>据西昌市风景园林绿化管理处园政科负责人介绍，2010年以来，组织了凉山州、西昌市林业专家对&ldquo;九龙汉柏&rdquo;进行会诊和抢救。光福寺先后也投入大量人力物力财力对古树进行了有效保护。抢救的主要措施有：采取补充营养成分、改善土壤条件等复壮措施；输液补充营养，打&ldquo;树动力&rdquo;等；清除白蚁，仅2013年就一次性清除了古树周围的30余处白蚁巢穴；打围栏，栽种仙人球，防止猴子上树对其破坏。</p>\r\n\r\n<p>该负责人介绍，今年以来，这棵&ldquo;九龙汉柏&rdquo;又病了，而且病得更严重了，很多枝桠都枯死了，目前只剩下两小枝桠绿叶。</p>\r\n\r\n<p>3月11日，西昌市风景园林绿化管理处紧急从省林业厅及川农大请来专家，为&ldquo;九龙汉柏&rdquo;把脉开方，进行第四次抢救。</p>\r\n\r\n<p><strong>救治方案/ 仍在制定中 尽力延长生命</strong></p>\r\n\r\n<p>3月11日，多位专家对&ldquo;九龙汉柏&rdquo;进行了现场诊断。川农大二级教授、森保专家朱天辉在对&ldquo;九龙汉柏&rdquo;进行近距离深入考察后说，&ldquo;毕竟树龄太老了，&lsquo;年龄&rsquo;不饶人，这是一个主要因素。从树的现状看，主要枝干都已枯萎死亡，树干完全裸露，树心腐化严重，树枝末端存活的少量枝叶已经开始出现枯黄衰败迹象，树的整体生命趋于衰危。&rdquo;</p>\r\n\r\n<p>朱天辉建议，由于树龄较大，树的大部分已经枯死，树皮也已经荡然无存，目前没有对其实施植皮（植树皮）的技术条件，不宜对&ldquo;九龙汉柏&rdquo;进行大刀阔斧的过度诊治，原则上应该在维持现状的基础上，进一步探明树木根系状况和病虫害情况，视情况采取一些必要的适度的清理和养护，延长其生命。</p>\r\n\r\n<p>&ldquo;针对古树现状，我们将制定切实可行的方案，尽可能延长古树的生命，留住凉山历史的活化石。&rdquo;昨日，西昌市园林处的有关负责人告诉成都商报记者，目前方案还在抓紧制定中，预计将在下周出来。</p>'),
(5, '假货强悍，移动互联网三招让其玩完', 'jiahuoqianghanyidonghulianwangsanzhaorangqiwanwan', '', 4, '', 0, 1426389016, 1426418039, 0, '<p>中国的产品质量问题饱受质疑，甚至被成为顽疾而归咎于民族的劣根性，实际上，我们现在面临的假货问题只是最近三十年的事情，不能让上一代人受过，就更没有理由责怪祖先。</p>\r\n\r\n<p>假货只是一台晚会曝光就可以解决吗？显然是不能。但是，我们仍然可以下断语，最近五年来的中国产品质量是向上走的，假冒伪劣的严重性在减弱，绝对不能再用愈演愈烈来形容。这种向好的趋势是央视的315晚会带来的吗？显然也不是，至少不是主要原因。</p>\r\n\r\n<p><strong>电商给予了假货沉痛的打击</strong></p>\r\n\r\n<p>我们不应忽视的是，中国产品质量的改善时间与电子商务的发展平行，两者存在显著的相关关系，应该说，正是因为电子商务的快速发展，大大压缩了制假贩假的生存空间，也让一直以来无法得到好转的顽疾得到了修正。</p>\r\n\r\n<p>也许有人说，电商平台的假货也很多，这两年的315晚会更是盯上了被老百姓投诉最多的网购领域。但是，分析一个问题要看全局，诚然，电商里也存在假冒伪劣，但如果以整个社会的假货量来衡量的话，电商发展之后消灭的假货数量远远超过自身产生的假货数量，电商让我们整个社会的产品质量得到了提升。</p>\r\n\r\n<p>还有一个不能忽视，如果说老百姓现在对于网购的投诉更多代，那也是因为网购的量级大大增加的缘故。我们假设，如今的网购投诉比五年前上升了3倍，可全社会网购的总体数量却增加了300倍，那不仅不能证明网购质量下降，相反却是说明整个社会的产品质量情况在好转，电商的服务也在提升。</p>\r\n\r\n<p>从原理上看，电子商务让商品的销售有轨迹可寻，电商平台对商家的管理能力也大大超过了农贸市场和街头小摊点，不管是源头上堵住假货，还是过程中对假货的追查，都变得更加可以实施。我们的结论是，电商的发展给予假货沉痛的打击，否则，也不会有那么多被惩罚或者清理的&ldquo;店主&rdquo;咒骂现形马云。</p>\r\n\r\n<p><strong>社交网络让假货无处遁形</strong></p>\r\n\r\n<p>对于假货来说，最怕信息透明，如果消费者掌握了相当水平的知识，或者一旦上当受骗就可以最快的速度将遭遇给社会共享，那假货的生存条件将逐渐丧失。</p>\r\n\r\n<p>以前，每年一次的315晚会，几家甚至十几家企业被集中曝光，这些企业大都会受到工商和质检部门的严肃处理，老百姓一片欢呼，很多企业都会选择在315前后做做样子，稍微有些收敛，等风头过了，该干什么还干什么，甚至会变本加厉。</p>\r\n\r\n<p>微信、微博等等社交工具的崛起，让朋友之间、消费者与专业服务机构之间、媒体与消费者之间都建立起了紧密的联系，这些信息通道快而直接，能够共享消费经验，还能进行科学知识的普及，这种媒体比原来的平面媒体或电视有着天然的打假能力。</p>\r\n\r\n<p><strong>信用体系建设将给造假致命一击</strong></p>\r\n\r\n<p>对于假货的治理，很多人偏爱严刑峻法，以为法制就可以解决问题。实际上，在严酷的法律都不能对假货治理起到根本的作用，因为很多假冒伪劣都处在擦边球的位置上，法律只能解决那些严重违法的作恶，就全社会造假反假的数量来说，法律根本不能顾及到。只要造假的利益足够大，风险足够小，就有更多的人会铤而走险，被抓住的人也不过是自认倒霉而已。</p>\r\n\r\n<p>假货问题的根本解决需要从道德层面的彻底改善，让每个人都以造假售假为丑恶，一旦有些许越界都会遭受道德的惩罚。可是，最近三十年，中国的现状是两猫理论，只要赚钱就是好的，成功的标准也仅仅是以钱的多少，所以，只要能赚钱，大家就会互相超出底线，时间长了，好人为了生存也可做坏事。</p>\r\n\r\n<p>这种得到层面的改善绝非一日之功，需要全社会再付出几十年甚至百年的代价两三代人才有可能根本性的改变，但是，这之前，由于移动互联网的发展，信用体系的建设将给假货以致命一击。</p>\r\n\r\n<p>在移动互联网和大数据的背景下，正在构建的全民信用体系一旦建立起来，售假贩假将被计入信用，未来将使这样的人在社会上寸步难行，远远不如规规矩矩做生意可能带来的未来效益更大，人们就不会再为了假货小利而冒险去售假。</p>\r\n\r\n<p><strong>在未来，借助移动互联网，监管部门或社会团体还能建造成功对假货治理的平台，随时随地和现实场景下的处理都会给造假分子以沉重打击，而移动互联购物经验和能力的提升，网购更是让假货没有生存的空间。对于假货来说，互联网不是加，而是地地道道的减，甚至是除法。</strong></p>'),
(6, '发生地方"dfadsfs"', 'fashengdifang"dfadsfs"', '', 4, '', 0, 1426392943, 1426418032, 0, '<p>zvzxcv</p>'),
(7, '杀毒软件将自己标记为恶意程序，成功自杀', 'shaduruanjianjiangzijibiaojiweieyichengxuchenggongzisha', '', 4, '', 0, 1426410482, 1426410482, 0, '<p>　　杀毒软件熊猫卫士本周三的一次更新错误将其核心文件<a href="http://www.zdnet.com/article/panda-antivirus-mistakenly-flags-itself-as-malware-breaks-pcs/" target="_blank">标记为恶意程序</a>，然后将这些文件隔离，软件本身随后也就停止了工作。</p>\r\n\r\n<p>　　熊猫卫士<a href="http://www.pandasecurity.com/uk/homeusers/support/card?id=100045" target="_blank">紧急发表声明</a>，建议用户不要重启电脑。受影响的版本包括了熊猫卫士的免费版、2015 零售版和企业级云安全服务。熊猫卫士称，导致这起令它尴尬万分的事故的原因是错误的签名，已迅速修复，该公司声称事故只影响很少一部分用户。如果用户在重启后无法登陆 Windows，熊猫建议进入安全模式，按照它公布在网上的指示一步步修复系统。</p>'),
(8, '最新研究发现人体存在145个“外来基因”', 'zuixinyanjiufaxianrenticunzai145gewailaijiyin', '', 4, '', 0, 1426415835, 1426418026, 0, '<p><img alt="最新研究发现人体存在 145 个“外来基因”" src="http://images.cnitblog.com/news/157064/201503/150933441204881.jpg" style="height:399px; margin:0px; width:515px" /></p>\r\n\r\n<p>英国剑桥大学最新研究显示，人体存在的&ldquo;外来基因&rdquo;源自远古时期共栖微生物。</p>\r\n\r\n<p>　　据国外媒体报道，目前，英国剑桥大学研究人员最新研究发现人体包含着 145 个&ldquo;外来基因&rdquo;，并非源自人类远古祖先。他们指出，这些人体必不可少的外来基因来自于远古时期寄居人体的微生物。</p>\r\n\r\n<p>　　该研究挑战科学家的传统基因遗传学观点，之前人们认为动物进化仅依赖于祖先物种遗传的基因，并且这一过程仍在继续。目前研究人员聚焦于水平基因转移(HGT)的使用，这种基因转移出现在生活同一环境的微生物。研究报告负责人、英国剑桥大学阿拉斯泰尔-克里斯普(Alastair Crisp)称，这是首次证实水平基因转移广泛出现在动物体，其中包括人类，从而导致数十、数百个活跃外来基因的出现。</p>\r\n\r\n<p>　　令人惊奇的是，这并不是一个罕见现象，看上去水平基因转移对于许多物种进化具有特殊意义，意味着我们应该重新认真思考人类进化历程。这项最新研究报告发表在近期出版的《基因生物学》杂志上。</p>\r\n\r\n<p>　　众所周知，单细胞生物被认为是一个重要进化过程，将解释细菌进化速度有多快，例如：细菌对抗菌素的抵御性。水平基因转移被认为在某些动物进化中具有重要作用，其中包括线虫。线虫从微生物和植物获得基因，一些甲虫物种也可以获得细菌基因制造生化酶，用于消化咖啡豆。然而水平基因转移出现在人类这样的复杂动物，而不是仅从祖先直接获得基因，这成为一个倍受争议的话题。</p>\r\n\r\n<p>　　研究人员分析了 12 种果蝇、4 种线虫和 10 种灵长类动物(包括人类)的基因组，他们计算了每种基因如何匹配其它物种的类似基因，从而评估哪些基因源自外来基因。通过对比其它物种，他们能够评估一些物种多长时间可以获得外来基因。他们发现灵长类动物多数水平基因转移源自远古时期，出现于脊索动物共同祖先和灵长类共同祖先之间某一时期。（悠悠/编译）</p>'),
(9, '白宫发起“让女孩读书”全球计划', 'baigongfaqirangnvhaidushuquanqiujihua', '', 4, '', 0, 1426415864, 1426418018, 0, '<p><img alt="白宫发起“让女孩读书”全球计划" src="http://images.cnitblog.com/news/66372/201503/151417275272829.jpg" style="margin:0px" /></p>\r\n\r\n<p>　　腾讯科技讯 3 月 14 日，目前全球约有 6200 万名女孩没有上学，其中半数都是处于青春期的少女。有鉴于此，美国白宫日前宣布发起&ldquo;让女孩读书&rdquo;（Let Girls Learn）的教育计划。这一计划是美国第一夫人米歇尔&middot;奥巴马（Michelle Obama）与志愿者团队 Peace Corps 带头发起的，旨在帮助全球青春期女孩上学，并完成学业。</p>\r\n\r\n<p>　　&ldquo;让女孩读书&rdquo;计划主要是通过为未受教育女孩提供上学机会，帮助她们解决面临的不平等问题，包括经济机会更少、感染艾滋病几率增加、包办婚姻以及其他暴力形式等。白宫发表声明称：&ldquo;当女孩接受高等教育后，她更有可能过上体面的生活，建立一个健康的家庭，并可提高本人、家庭甚至其所在社区的生活质量。&rdquo;</p>\r\n\r\n<p>　　2014 年，美国国际开发署（USAID）曾发起呼吁公众参与的同名活动。白宫表示，新的努力将提高现有计划水平，利用好现有的伙伴关系，并建立新的伙伴关系。此外，通过&ldquo;以社区为基础的解决方案&rdquo;，敦促其他政府和组织兑现承诺，即增加向全球青春期少女提供的资源。美国将通过国务院、国际开发署、Peace Corps 以及私人捐赠提供 2.5 亿美元资金，建立新的教育基金。</p>\r\n\r\n<p>　　据米歇尔的幕僚长蒂娜&middot;陈（Tina Tchen）称，第一夫人非常关注女孩教育问题，她坚信&ldquo;以社区为基础的解决方案&rdquo;可以根除教育障碍。她说：&ldquo;在过去 6 年的旅行中，米歇尔曾与当地领导人、&ldquo;非洲青年领袖计划&rdquo;的曼德拉华盛顿奖学金获得者(Mandela Washington Fellows)会面，并与专家和全球教育界人士探讨。第一夫人已经获得&rsquo;以社区为基础解决方案&lsquo;的第一手资料，并相信其可根除全球女孩面临的教育障碍。&rdquo;</p>'),
(10, 'Feetz：打造70亿种尺寸的鞋不是梦', 'Feetzdazao70yizhongchicundexiebushimeng', '', 4, '', 0, 1426415886, 1426418000, 0, '<p><img alt="Feetz：打造 70 亿种尺寸的鞋不是梦" src="http://images.cnitblog.com/news/66372/201503/151412183702112.jpg" style="margin:0px" /></p>\r\n\r\n<p>&ldquo;我的鞋不是 6 号码也不是 7 号码，而是露西码。&rdquo;Feetz 创始人兼首席执行官露西比尔德（LucyBeard）14 日在 SXSW 大会创业加速器项目陈述环节中这样说。</p>\r\n\r\n<p>　　Feetz 的目标是为每一个人打造一款专属于他个人的绝对合脚的鞋。比尔德说，&ldquo;使用 3D 打印技术，我们可以精确地为每个人量身定做一款最合适他尺寸的鞋。&rdquo;</p>\r\n\r\n<p>　　&ldquo;这个世界上有 70 亿双尺寸的脚。&rdquo;比尔德说，&ldquo;并不是只有那有限的几个尺寸。&rdquo;</p>\r\n\r\n<p>　　在演讲开始之前，比尔德做了一个现场小调查，她问在场的所有人，有多少人现在觉得自己脚上穿的鞋不合脚的？虽然她没有要求大家举手，但可以看到现场很多人面面相觑，会心一笑。</p>\r\n\r\n<p>　　比尔德带领的这家创业公司找到了这样一个实实在在的&ldquo;痛点&rdquo;，并正在致力于解决它。Feetz 的方案是，用户使用它们开发的智能手机应用程序，对自己的脚拍三张照片，然后将照片发送给他们，他们将根据用户的脚的照片，通过 3D 打印机制造出专属于每一个用户的独特尺寸的鞋，然后在接下来的一周以内的时间内，寄送到用户家中。</p>\r\n\r\n<p>　　现场的评委似乎也对这个创业项目十分感兴趣，在她的陈述环节结束后，评委轮番提问&ldquo;售价多少？是否有线下合作？融资情况如何？&rdquo;</p>\r\n\r\n<p>　　对于这些问题，比尔德都一一做了解答。目前，Feetz 的鞋售价在 200 美元左右，并不便宜，她解释到，未来销量上规模后，价格会相应下调，会做到 100 美元以下。</p>\r\n\r\n<p>　　不久前，Feetz 刚刚完成了种子轮 125 万美元的融资，目前该初创团队仅有 7 名成员。</p>\r\n\r\n<p>　　担任本轮可穿戴设备创业项目竞赛评委之一的 TrueVentures 投资主管亚当&middot;奥古利（AdamD&rsquo;Augelli）会后对腾讯科技表示，之所以对这个项目感兴趣，因为引起了自己的共鸣，因为他本人也对鞋不合脚有切身的感受。</p>\r\n\r\n<p>　　奥古利说，自己是一名热爱跑步的人，但是饱受膝盖伤痛困扰，很多时候找不到合脚的跑鞋。</p>\r\n\r\n<p>　　他认为，可穿戴设备最重要的就是要考虑实用性和舒适性，让人们愿意使用它、离不开它，而 Feetz 公司的产品很好地兼顾到了这两方面。</p>\r\n\r\n<p>　　另一个赢得评委肯定的，是 Feetz 产品定制化的理念，真正实现了对每个用户量身定做。</p>\r\n\r\n<p>　　比尔德表示，自己在开始这个项目之前的某一天，忽然发现去星巴克点杯咖啡的定制化程度都比选择鞋的尺码要大，于是便萌生了为每个人打造一款绝对合脚的鞋的想法。</p>\r\n\r\n<p>　　&ldquo;这个里面没有太多让人惊艳的东西，很容易理解，很容易执行，让每个人都开心，&rdquo;奥古利说，&ldquo;但往往这样的项目是我们所喜欢的。&rdquo;</p>'),
(11, '这家公司用3D打印技术打印人体器官', 'zhejiagongsiyong3Ddayinjishudayinrentiqiguan', '', 4, '', 0, 1426415927, 1426418010, 0, '<p>　 &nbsp; &nbsp;用 3D 打印机打印出人体组织替换人体器官已经不再是梦想，一家叫做 BioBots 的公司正在做这样的事。</p>\r\n\r\n<p>　　15 日，BioBots 团队来到 SXSW 大会参加创业加速器医疗健康项目竞赛，对最终的创业项目大奖志在必夺。</p>\r\n\r\n<p>　　BioBots 在现场展示了他们的产品，一款售价 5000 美元的红白相间的用于打印人体组织的 3D 打印机，以及一个用该打印机打印的人耳的模型。</p>\r\n\r\n<p><img alt="这家公司用 3D 打印技术打印人体器官" src="http://images.cnitblog.com/news/66372/201503/151409193082509.jpg" style="margin:0px" /></p>\r\n\r\n<p>（BioBots 公司在现场展示的 3D 打印机）</p>\r\n\r\n<p>　　虽然用 3D 打印机打印人体器官的概念已经不新，但 BioBots 团队产品的独特之处在于，他们的打印机足够的小，长宽高均为 12 英寸，但却能打印出足够复杂的生物组织。</p>\r\n\r\n<p><img alt="这家公司用 3D 打印技术打印人体器官" src="http://images.cnitblog.com/news/66372/201503/151409176679506.jpg" style="margin:0px" /></p>\r\n\r\n<p>（BioBot 公司首席运营官 MadelineWinter 展示用 3D 打印机打印的人耳模型）</p>\r\n\r\n<p>　　其首席运营官 MadelineWinter 在会后对腾讯科技表示，该公司已经和宾夕法尼亚大学和德克赛尔大学的医学研究部门合作，并希望从这些最初的合作伙伴处得到反馈，用以改进下一代产品。</p>'),
(12, 'App Store需要向Google Play学习的十点内容', 'App-StorexuyaoxiangGoogle-Playxuexideshidianneirong', '', 4, '', 0, 1426415960, 1426415960, 0, '<p><img alt="" src="http://images.cnitblog.com/news/66372/201503/151326333559728.jpg" style="margin:0px" /></p>\r\n\r\n<p>　　英文原文：<a href="https://medium.com/ios-os-x-development/10-things-google-play-does-better-than-the-app-store-fefd1844cd7" target="_blank">10 Things Google Play Does Better than the App Store</a></p>\r\n\r\n<p>　　在本文中，HourTracker 的制作者分享了他对于 Google Play 和 App Store 两者的看法。它们在面对程序员时所采取的立场和态度。固然 App Store 为他带来的收入是 Android 环境下的好几倍，但是他相信如果 Apple 能够从 Google 身上学到下面的十点内容，那么它将经营的更加出色。</p>\r\n\r\n<hr />\r\n<p>　　两年前，我开始写 Android 环境下的有关 HoursTracker 这款 App 的第一行代码。当时很多用户都是从 iOS 转到你 Android 阵营的，都给我发邮件请求我专门开发出来一款 Android 版本的 App。除此原因之外，当时 iOS 6 的 App Store 中有关搜索条件的变更警醒了我，我意识到不能把鸡蛋全部放到一个篮子里。所以在历经了三个月的开发，于 2013 年的 5 月 13 日 HoursTracker 的 Android 版本终于问世。</p>\r\n\r\n<p>　　可以这么说，我的绝大部分收入都是来自于 App Store，并且最新款的 iPhone 仍然是我的主力设备，iOS 环境名正言顺的成为了我的主力战场。但是，我不得不承认 Google Play 有很多地方做的比 App Store 要好太多，值得后者好好学习。</p>\r\n\r\n<p><strong>　　1.&nbsp;Google Play Store 的使用体验</strong></p>\r\n\r\n<p><img alt="" src="http://images.cnitblog.com/news/66372/201503/151326332924242.png" style="margin:0px" /></p>\r\n\r\n<p>　　上图就是用户在 Google Play 里面看到 HoursTracker 的情景。其中很重要的一点是，Google Play 在每一款 App 的下载页面都显示了下载的数据。通过一个类似于徽章的图标非常明白无误的告诉所有人这款 App 的流行程度，如果在 App Store 里面也能看到类似的统计结果的话那就最好不过了。</p>\r\n\r\n<p>　　Google Play 不会在每次版本更新之后重置评级分数。评级对于市场的反馈，以及用户的决策下载乃至购买的话都是非常重要的指标。在 App Store 里面，每次更新完之后这个评级分数是暂时失效的。这对于某些用户来说，他们会在选择是否下载 App 上不知所措。</p>\r\n\r\n<p><strong>　　2. Google Play 提供了一个针对性的短小精炼的 App 描述</strong></p>\r\n\r\n<p><strong><img alt="" src="http://images.cnitblog.com/news/66372/201503/151326342147156.png" style="height:192px; margin:0px auto; width:622px" /></strong></p>\r\n\r\n<p>　　众所周知，绝大部分的浏览者都没有时间去读什么 App 的介绍。在 App Store 里面，App 介绍甚至有些时候非常的随意，底下还安放着一个「阅读更多」的按钮。浏览者很难见到一个短小精炼，比较靠谱的 App 介绍。而在 Google Play 中这个问题就得到了解决。</p>\r\n\r\n<p>　　<strong>3. Google Play 可以直接从网页上将 App 下载到你的移动数字设备中</strong></p>\r\n\r\n<p>　　在 Google Play 基于网页的登录界面上，你可以看到一个「安装」的按钮。在浏览器中点击这个按钮，很快你就会发现你的手机上已经出现了这款 App。你无需任何额外的软件，也无需将自己的手机掏出来。这非常节省用户的哦时间，帮助程序员们清除阻碍下载的各种障碍。</p>\r\n\r\n<p>　　<strong>4. Google Play 提供关于 App 的 8 张截图，而不仅仅是 5 张</strong></p>\r\n\r\n<p>　　从我开发 HoursTracker 的经验来说，5 张截图并不能充分反映出一款 App 所拥有的各种功能和体验。不知道是不是 8 是个幸运数字，但是我的观点肯定是截图越多越好。</p>\r\n\r\n<p>　　<strong>5. Google Play 允许 App 的推介视频可以是任何时长的</strong></p>\r\n\r\n<p>　　这个道理跟前面的截屏是一样的。越是复杂高级的 App 需要时长更长的推介视频。30 秒有时候根本不够完整的展示一款 App 所具有的功能。几乎我所接触过的有关生产力提升方面的 App 在视频推介上面都做的非常匆忙潦草。当然，在没有时间约束的前提下，我也很有可能做出来冗长沉闷的视频惹得用户生厌，但是我很欣然的接受这样一种能够犯错的可能。</p>\r\n\r\n<p><strong>　　6. Google Play 的程序员体验</strong></p>\r\n\r\n<p><img alt="" src="http://images.cnitblog.com/news/66372/201503/151326339496843.png" style="height:245px; margin:0px; width:640px" /></p>\r\n\r\n<p>　　程序员可以随时更改初始 App 上的数据，其中包括截屏。很久之前，其实我们也可以在 iOS 环境下做到这一切。但是如今我们仅仅是为了更改一个截屏，就要重新打一份完整的 App 更新申请上去。申请通过之后，所有 App 的用户都不得不重新再下载一次。这并不会一个人人都会喜欢的流程和功能。有一种说法是：不受限制的截屏也许会带来各种错误的解读以及不合适出现在公众场合的图片，但难道就因为这种说法的存在，我们连按照自己的意愿，按照我们想要的顺序来展示这些截屏图片都不行啊？！每一次更新都要重新提交一遍截屏文件，我们理解 Apple 背后的动机：它确实是很想对我们的内容进行审核把控，测试我们进行市场营销所用的各种素材是否合适。</p>\r\n\r\n<p>　　这里应该有一种折中的办法。如果 App Store 就是允许 5 张截屏图片，也许可以允许我们自行上传最多 10 张，如果获得了审批通过，那么我们可以在这 10 张图片中按照自己的想法选择出来 5 张图片，然后按照我们的顺序放到上面进行展示。</p>\r\n\r\n<p>　　上述建议使得程序员们可以测试各种不同的截屏图片组合，来找出到底怎样的方案对于提振收入是最有效的，同时还能够提升 App 的评价质量，节省用户和我们程序员的宝贵时间。</p>\r\n\r\n<p>　　这种方法同样也能拓展到其他被种种程序卡死锁定的环节中。比如 App 的预览视频以及搜索关键词等方面。我想这应该是对于 Apple 官方，程序开发员以及用户三方都皆大欢喜的事，它为什么不做呢？</p>\r\n\r\n<p><strong>　　7. 程序员可以在他们的 App 登录页面，将某个评论进行高亮展示</strong></p>\r\n\r\n<p><img alt="" src="http://images.cnitblog.com/news/66372/201503/151326338249571.png" style="height:444px; margin:0px; width:640px" /></p>\r\n\r\n<p>　　如果真的有一位用户对你的 App 大加赞美，你可以将这个评论从众多评论中挑拣出来，然后高亮显示它。对于 Google Play 和一些营销工具（比如你的 App 的网站以及线上广告）直连的模式来说特别管用。</p>\r\n\r\n<p>　　<strong>8. 程序员可以直接退款给客户</strong></p>\r\n\r\n<p>　　我想下面陈述的一种困扰也许每一个 iOS 程序员都会感同身受。如果有一位客户过来向你反映 App 的种种问题，你所能做的必须是先去找 Apple。其实客户本身来说最想直接沟通的是 App 的程序员。在 App Store 中最关键的点就在于「退款」。如果用户真的不满意这款 App，或者觉得没有能力来使用它，那么用户是可以得到退款的，但是程序员却没有权限来自行进行审批，一切都得通过 Apple 这个官方来完成。Google Play 在这一点上就做的非常好，它允许程序员拥有是否决定「退款」的权限，程序员在决定是否退款上面拥有自己的决断权利。</p>\r\n\r\n<p><strong>　　9. 程序员能够自由的发布版本更新</strong></p>\r\n\r\n<p>　　这是非常重要的一点，因为它直接区分开来 Google 和 Apple 某些根本观念的不同。</p>\r\n\r\n<p>　　我们所有程序员都在 App 开发过程中遭遇一些尴尬的时刻，在 App 的不断完善的过程中肯定会难免出现这样或者那样的 Bug。每一次我为了给 iOS 的 App 提交一个版本更新的申请，我的内心都充满了担忧，不安和紧张。如果这次的申请通过了，但是发布之后确实有了一点小的差错，那么我估计将在接下来的 7 到 10 天内重新提交申请获得通过，我甚至有可能将整个 App 从商店的货架上直接撤下来。但是在 Google Play 中，这样的剧本绝对不会上演。因为一旦我发现了一些小问题，比如虽然很小但是却足够造成非常大影响的问题，我可以在短短 20 分钟之内将其修复，让它彻底完善。</p>\r\n\r\n<p>　　说实话，在 App Store 中，我等待审批的焦虑远远超过了修复 BUG 本身所带来的焦虑。如果我真的在更新的版本中加入了一个超级赞的功能，但是在审批过程中，由于某些我不知道的原因，也许是存在了多年的某个环节上的隐患和问题，导致了整个更新申请遭到拒绝呢？或者还有更糟的情况发生。如果确实审批通过了，但是很快我收到了一封邮件，Apple 官方要求我将某款新的功能撤下，因为用户已经在之前的消费中花钱购买了这款服务。那么这样一来我就面临选择：要么我对其提出申辩，这估计得花上超过一个星期的时间；要么我顺从官方的要求，将这些新功能彻底取消掉。另外，每次发布一版更新，那些曾经辛辛苦苦收集到好评和点赞就全部烟消云散，我的 App 就立刻变得像是一款没人使用的僵尸 App，而不是一款人气走红的 App。这毫无疑问会影响到 App 带来的收入。</p>\r\n\r\n<p>　　对于我来说，这一切都会导致我很不情愿在 App Store 里面做版本的更新。每次我提交申请，固然我会为客户，为我的事业感到开心，但是我的心绪是纠结的，担心总有哪个地方出现问题。因为通过一次申请不容易，花费时间长不说，而且还会清零你之前所获得的好评。而在 Google Play 中就不会出现这种情况，我不需要担心任何事，这对于我来说真的是一次如释重负的解脱。Google Play 不可能将 App 的评论延后，程序员很自由的按照意愿来做 App 上的修改，在既有的计划时间框架内，将最新版本的 App 推送到市场上。这种流程环节的简化，对于 Android 来说至关重要。因为它的生态系统中拥有了极度多元化的硬件产品。</p>\r\n\r\n<p>　　<strong>10. 程序员可以从 Google Play 的仪表盘上得到丰富的数据</strong></p>\r\n\r\n<p>　　自从 2014 年的 WWDC 大会举行以来，我们都在翘首以盼 App Store 推出的后台数据分析工具的问世。已经演示过的数据分析工具看起来非常棒，但是自从那次之后即再也没有了下文，长时间的拖延使得大家不怎么指望最近它会真正发布出来了。而如今 Google Play 推出了后台数据分析工具，以下是我在上面最喜欢关注的一些指标：</p>\r\n\r\n<p>　　1. 现有安装数及下载数。</p>\r\n\r\n<p>　　2. 每个版本的 App 安装数以及每个操作系统中的安装数，这里尤其指出来的是这一点对于 Android 来说更加重要。</p>\r\n\r\n<p>　　3. 以周为单位，或者以年为单位的付费用户转化比例- 也就是在下载量里面到底有多少人愿意去付费购买，分别以周和年作为尺度进行考量。</p>\r\n\r\n<p>　　4. 平均每个用户的花费。如果你在 App 内部设置了不同的价格区分，那么这个数据就非常有用了。</p>\r\n\r\n<p>　　<strong>对于未来的期盼</strong>：</p>\r\n\r\n<p>　　Android 版本的 HoursTracker 给我带来的收入正在稳定的增长，但是 iOS 版本仍然在日收入上是 Android 版本的好几倍。这收入上的差别和 Google Play 以及 App Store 所具有的市场环境不同不无关系。但是我想上面指出来的 10 点建议让 App Store 能够更加完美强大，让每一个人都能够获益匪浅。</p>\r\n\r\n<p>　　不管怎么说，我现在非常期待在今年夏季召开的 WWDC 大会上，App Store 会有怎样的更新，我更希望看到这些更新中真的会汲取到 Google Play 的一些做法和经验。</p>');

-- --------------------------------------------------------

--
-- 表的结构 `od_article_kind_define`
--

CREATE TABLE IF NOT EXISTS `od_article_kind_define` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(47) NOT NULL DEFAULT '' COMMENT '分类标题',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序值',
  `cdate` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章种类定义表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `od_article_kind_define`
--

INSERT INTO `od_article_kind_define` (`id`, `name`, `sort`, `cdate`) VALUES
(1, 'javascript', 0, 0),
(2, 'css', 0, 0),
(3, 'html5', 0, 0),
(4, 'php', 0, 0),
(5, 'java', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `od_article_tag`
--

CREATE TABLE IF NOT EXISTS `od_article_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `aid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `tid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'tag id',
  `cdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章tag对应表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `od_article_tag_define`
--

CREATE TABLE IF NOT EXISTS `od_article_tag_define` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'tag id',
  `name` varchar(47) NOT NULL DEFAULT '' COMMENT 'tag值',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序值',
  `cdate` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文档 tag定义表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `od_comment`
--

CREATE TABLE IF NOT EXISTS `od_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '留言id',
  `blog_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '对应的blog id',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级留言id',
  `root_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最顶级的留言id',
  `name` varchar(200) NOT NULL DEFAULT '' COMMENT '留言名字',
  `email` varchar(200) NOT NULL DEFAULT '' COMMENT '留言者email',
  `body` text COMMENT '留言内容',
  `cdate` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '留言时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='留言' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `od_comment`
--

INSERT INTO `od_comment` (`id`, `blog_id`, `parent_id`, `root_id`, `name`, `email`, `body`, `cdate`) VALUES
(1, 10, 0, 0, 'ouxingzhi', 'ouxingzhi@vip.qq.com', '的呵呵呵打电话呵呵', 0),
(2, 10, 0, 0, '偶形式但是的', '阿斯顿发放', '是的发的方法', 0),
(3, 10, 0, 0, 'asdff', 'asdfa', '&lt;script&gt;alert(''sss'')&lt;/script&gt;', 0),
(4, 11, 0, 0, '欧兴志', 'ouxingzhi@vip.qq.com', '活动和基督教的解放军附近酒店', 0);

-- --------------------------------------------------------

--
-- 表的结构 `od_config`
--

CREATE TABLE IF NOT EXISTS `od_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置 id',
  `key` varchar(47) NOT NULL DEFAULT '' COMMENT '配置 key',
  `value` text COMMENT '配置内容',
  `title` varchar(47) NOT NULL DEFAULT '' COMMENT '标题',
  `desc` varchar(500) NOT NULL DEFAULT '' COMMENT '描述',
  `kind` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '配置分类',
  `sort` int(11) unsigned NOT NULL DEFAULT '999' COMMENT '排序',
  `type` int(1) unsigned NOT NULL DEFAULT '0',
  `define` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='配置表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `od_config`
--

INSERT INTO `od_config` (`id`, `key`, `value`, `title`, `desc`, `kind`, `sort`, `type`, `define`) VALUES
(2, 'web_title', 'OD BLOG', '网站标题', '网站头部中大标题', 1, 0, 0, ''),
(3, 'web_sub_title', '我的blog', '网站副标题', '网站的副标题', 1, 0, 1, ''),
(4, 'about', '这是我的博客。这是我的博客。这是我的博客。这是我的博客。这是我的博客。这是我的博客。这是我的博客。这是我的博客。这是我的博客。这是我的博客。这是我的博客。这是我的博客。这是我的博客。这是我的博客。这是我的博客。', '关于我们', '右侧的关于我们', 1, 0, 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `od_config_kind`
--

CREATE TABLE IF NOT EXISTS `od_config_kind` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置种类id',
  `title` varchar(47) NOT NULL DEFAULT '' COMMENT '配置种类标题',
  `desc` varchar(500) NOT NULL DEFAULT '' COMMENT '配置种类描述',
  `sort` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='配置种类' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `od_config_kind`
--

INSERT INTO `od_config_kind` (`id`, `title`, `desc`, `sort`) VALUES
(1, '公共配置', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `od_user`
--

CREATE TABLE IF NOT EXISTS `od_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` varchar(47) NOT NULL DEFAULT '' COMMENT '用户名',
  `nickname` varchar(100) NOT NULL DEFAULT '' COMMENT '昵称',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT 'email',
  `password` varchar(47) NOT NULL DEFAULT '' COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `od_user`
--

INSERT INTO `od_user` (`id`, `name`, `nickname`, `email`, `password`) VALUES
(6, 'ouxz', 'ouxingzhi', '', 'e10adc3949ba59abbe56e057f20f883e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;