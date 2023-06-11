<?php

require_once get_template_directory() . '/api/CommonController.php';
require_once get_template_directory() . '/interface/GamesInterface.php';

class AnimeController extends CommonController implements GamesInterface {

	public function getGamerInfo() {
		// TODO: Implement getGamerInfo() method.
	}

	public function getGamerInventory(): array {
		return [
			[
				'title'        => '青春猪头少年不做兔女郎学姐的梦',
				'url'          => 'https://ao-buta.com',
				'img'          => '/wp-content/uploads/2023/06/240038_b5j7g.jpg',
				'progress'     => 100,
				'description'  => '思春期症候群——这是一种只发生在易敏感和不稳定的青春期的、不可思议的现象。
				例如，在梓川咲太面前出现的野生兔女郎。
				她的真实身份是高中高年级学生，明星活动休止的女演员樱岛麻衣。她迷人的身姿，不知为何在周围的人眼里看不出来。
				咲太决定解开这一谜题。在于麻衣一起度过的时间里，咲太知道了她秘密的想法……
				女主人公们一个接一个地出现在咲太的周围，她们都有着“青春期症候群”。在天空和大海都很闪耀的小镇上，开始了令人激动的故事。',
				'type'         => '番剧',
				'project'      => 'Aniplex',
				'date'         => '2018年10月3号',
				'been_episode' => '已看完',
				'all_episode'  => '全13话',
			],
			[
				'title'        => '青春猪头少年不做怀梦美少女的梦',
				'url'          => 'https://ao-buta.com/themovie',
				'img'          => '/wp-content/uploads/2023/06/260680_Sx2HP.jpg',
				'progress'     => 100,
				'description'  => '居住在天空与海洋辉映的城镇“藤泽”的梓川咲太，就读高中二年级。 
				他与既是学姐又是恋人的樱岛麻衣所度过的令人雀跃的日常，随着初恋对象牧之原翔子的出现而改变。 
				不知为何，存在着“中学生”和“大人”两个翔子。 
				出于无奈开始和翔子住在一起的咲太，受到“大人翔子”的捉弄，和麻衣的关系也变得尴尬。
				此时，“中学生翔子”身患重病的事实被发现，咲太的伤痕开始隐隐作痛——。',
				'type'         => '番剧',
				'project'      => 'CloverWorks',
				'date'         => '2019年6月15日',
				'been_episode' => '已看完',
				'all_episode'  => '全1话',
			],
			[
				'title'        => '欢迎来到实力至上主义教室',
				'url'          => 'http://you-zitsu.com/',
				'img'          => '/wp-content/uploads/2023/06/214272_JVVxM.jpg',
				'progress'     => 100,
				'description'  => '这个社会是否平等呢。真正的“实力”是什么——。
				东京都高度育成高等学校。那是宣扬彻底的实力至上主义，以升学率·就业率100%而引以为豪的升学学校。
				升入那里，被分配到1年D班的绫小路清隆，却发现学校与实力至上主义的招牌相反，学生每个月会得到相当于10万日元、与现金同等价值的分数，在授课和生活态度方面也贯彻放任主义。
				在梦幻般的高中生活当中，不断地挥金如土、过着自甘堕落日子的同班同学们。但，不久他就得知了学校系统的真面目，并被打入绝望的深渊……！
				来自吊车尾聚集的D班的少年少女们所发现的，是世界的矛盾，还是正当的实力社会？',
				'type'         => '番剧',
				'project'      => 'Crunchyroll',
				'date'         => '2017年7月12日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '我的青春恋爱物语果然有问题',
				'url'          => 'http://www.tbs.co.jp/anime/oregairu/1st',
				'img'          => '/wp-content/uploads/2023/06/54433_JZ99l.jpg',
				'progress'     => 100,
				'description'  => '别扭的，没有朋友，没有女朋友，对着那些讴歌青春的同学吐槽着“他们都是骗子，都在说谎，快点爆发把我”的男主角的爱情物语，将来的梦想是“不工作”——
				这样的高中生八幡被生活指导老师的带到了学校第一美少女雪乃所属的“侍奉部”，与美少女意想不到的相遇……怎么想都是恋爱故事的展开吧！？
				但是雪乃却无论如何都原谅不了八幡那令人残念的糟糕性格！
				不断轮回着的充满问题的青春——我的青春，到底怎么了！？',
				'type'         => '番剧',
				'project'      => 'TBS',
				'date'         => '2013年4月4日',
				'been_episode' => '已看完',
				'all_episode'  => '全13话',
			],
			[
				'title'        => '我的青春恋爱物语果然有问题 OVA',
				'url'          => 'www.tbs.co.jp/anime/oregairu/1st',
				'img'          => '/wp-content/uploads/2023/06/82777_78uUP.jpg',
				'progress'     => 100,
				'description'  => 'PSV游戏「果然在游戏里我的青春恋爱物语也有问题。」2013年9月19日发售，限定版将同捆原作者渡航担任脚本的新作OVA，讲述TV动画中未播出的番外篇故事。',
				'type'         => '番剧',
				'project'      => 'Brain\'s Base',
				'date'         => '2013年9月19日',
				'been_episode' => '已看完',
				'all_episode'  => '全1话',
			],
			[
				'title'        => '我的青春恋爱物语果然有问题 续',
				'url'          => 'http://www.tbs.co.jp/anime/oregairu/2nd',
				'img'          => '/wp-content/uploads/2023/06/102134_luzUc.jpg',
				'progress'     => 100,
				'description'  => '因过去的心理阴影而以独自的别扭思考回路讴歌着“独自生活”的比企谷八幡，由于意外的事件而被生活指导担当教师平冢静带去“侍奉部”并加入其中。
				他和同社团所属的令人窒息的完美美少女·雪之下雪乃，以及班级上位阶级所属的时髦女子·由比滨结衣一同，从解决班上的人际关系问题到文化祭实行委员的运营，度过着解决各种案件的每一天。
				时至秋日，八幡等二年级学生前去修学旅行。此时，侍奉部接收到了一个委托。
				随着新登场的一色彩羽的加入，他们的关系更加错综复杂。
				——八幡空虚的价值观也有了少许变化，在这些经验过后，他的高中生活又将迎来新的展开。',
				'type'         => '番剧',
				'project'      => 'TBS',
				'date'         => '2015年4月2日',
				'been_episode' => '已看完',
				'all_episode'  => '全13话',
			],
			[
				'title'        => '我的青春恋爱物语果然有问题 续 OVA',
				'url'          => 'www.tbs.co.jp/anime/oregairu/2nd',
				'img'          => '/wp-content/uploads/2023/06/142678_uYQqS.jpg',
				'progress'     => 100,
				'description'  => 'PSV游戏「果然在游戏里我的青春恋爱物语也有问题。续」2016年10月27日发售，限定版将同捆新作OVA，讲述原作10.5卷中以一色彩羽为中心的故事。',
				'type'         => '番剧',
				'project'      => 'feel.',
				'date'         => '2016年10月27日',
				'been_episode' => '已看完',
				'all_episode'  => '全1话',
			],
			[
				'title'        => '我的青春恋爱物语果然有问题 完',
				'url'          => 'http://www.tbs.co.jp/anime/oregairu',
				'img'          => '/wp-content/uploads/2023/06/277954_s8qHA.jpg',
				'progress'     => 100,
				'description'  => '看似在过去的心理阴影及独自的别扭思考回路之下讴歌着“独自生活”的比企谷八幡，偶然地被生活指导担当教师平冢静带着加入了「侍奉部」。
				他和同社团所属的令人窒息的完美美少女·雪之下雪乃，以及班级上位阶级所属的时髦女子·由比滨结衣一同，从解决班上的人际关系问题到给学生会帮忙，度过着解决各种事件的每一天。
				季节流转，时至春天。八幡与结衣，接受了雪乃最后的委托。在准备3月的毕业典礼过程中，还被彩羽请求协助毕业舞会……
				——追求真物的八幡，与3人的关系逐渐改变。究竟他的高中生活将迎来怎样的结局！？',
				'type'         => '番剧',
				'project'      => 'TBS',
				'date'         => '2020年7月9日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '咒术回战',
				'url'          => 'https://jujutsukaisen.jp/',
				'img'          => '/wp-content/uploads/2023/06/294993_JrrzK.jpg',
				'progress'     => 100,
				'description'  => '少年战斗着——「为寻求正确的死亡」
				辛酸·后悔·耻辱人类产生的负面情感，化为诅咒，潜入日常生活诅咒是蔓延于世界的祸源，最糟糕的情况下，会让人类踏入死亡，并且诅咒只能以诅咒拔除。
				虎杖悠仁是一位体育万能的高中生，某天他为了从“咒物”危机中解救学姐，而吞下了被诅咒的手指“两面宿傩之指”，让“宿傩”这种诅咒跟自己合而为一。
				在最强咒术师五条悟的指引下，进入对诅咒专门机关「东京都立咒术高等专门学校」，并遇到了伏黑惠与钉崎野蔷薇这两位同学。
				某日，突然出现“特级咒物”，他们三人就奉命到现场支援。为了实现爷爷要他“助人”的遗言，虎杖将会继续与“诅咒”奋斗下去。
				为了祓除诅咒而成为诅咒的少年，无法回头的壮阔故事开始了——',
				'type'         => '番剧',
				'project'      => 'MAPPA',
				'date'         => '2020年10月2日',
				'been_episode' => '已看完',
				'all_episode'  => '全24话',
			],
			[
				'title'        => '鬼灭之刃',
				'url'          => 'https://kimetsu.com/anime/',
				'img'          => '/wp-content/uploads/2023/06/245665_5an54.jpg',
				'progress'     => 100,
				'description'  => '大正时期、日本。
				卖炭的心地善良的少年·炭治郎，有一天被鬼杀死了家人。
				而唯一幸存下来的妹妹祢豆子变成了鬼。
				被绝望的现实打垮的炭治郎，为了让妹妹变回人类并讨伐杀害家人的鬼，决心沿着“鬼杀队”的道路前进。
				人与鬼交织的悲哀的兄妹的故事，现在开始！',
				'type'         => '番剧',
				'project'      => 'Aniplex',
				'date'         => '2019年4月6日',
				'been_episode' => '已看完',
				'all_episode'  => '全26话',
			],
			[
				'title'        => '冰菓',
				'url'          => 'http://www.kotenbu.com/',
				'img'          => '/wp-content/uploads/2023/06/27364_f432B.jpg',
				'progress'     => 100,
				'description'  => '以节能为座右铭的高中生折木奉太郎， 为一个小小的原因而加入了濒临废社的“古典文学部”。
				古典文学部的社员，包括他在社里认识的好奇宝宝，也就是女主角千反田爱瑠，还有他从国中就认识的伊原摩耶花和福部里志。
				这是他们四人以神山高中为舞台，对一桩桩事件展开推理的青春学园推理剧。
				“我很好奇！”奉太郎平静的灰色高中生活，因为千反田的这一句话而为之一变！',
				'type'         => '番剧',
				'project'      => '神山高校古典部OB会',
				'date'         => '2012年4月22日',
				'been_episode' => '已看完',
				'all_episode'  => '全22话',
			],
			[
				'title'        => '火影忍者',
				'url'          => 'http://www.naruto.com/',
				'img'          => '/wp-content/uploads/2023/06/3425_9PQ1L.jpg',
				'progress'     => 100,
				'description'  => '在火影忍者正式故事展开的12年前，一只被称为九尾 妖狐的妖怪袭击木叶忍者村，传说它一挥动尾巴就会山崩海啸。当时的第四代火影“木叶黄色闪光”波风皆人牺牲自己的性命，把九尾封印在刚出生的孩子 漩涡鸣人身上。
				“第四代火影”被村里的人认为是英雄，但他更希望村里的人同样地将鸣人当作英雄看待。但村民认为鸣人就是妖狐的化身，而不是作为封印妖狐的幕后功臣，因此为鸣人自小就被人歧视。
				重新复出的“第三代火影”已经禁止村民和后代提到这次的九尾突袭事件，但是仍不能阻止人们排挤鸣人。就连他们不知情的后代，在父母的感染下，亦疏远鸣人。因此，鸣人从小倍受孤立。为了引起其他人注意经常恶作剧。但这种状况在他成功的通过“忍者学校”的毕业考试后逐渐改变，并以成为“火影”为目标努力。
				火影忍者故事既包含严肃和娱乐的情节，整个故事以鸣人及其朋友的成长为核心，并描绘他们在人生经历当中的相互感情。鸣人与两位好友 宇智波佐助和春野樱，和他们的导师“复制忍者”旗木卡卡西组成第七组执行各种任务。',
				'type'         => '番剧',
				'project'      => '岸本斉史',
				'date'         => '2002年10月3日',
				'been_episode' => '已看完',
				'all_episode'  => '全220话',
			],
			[
				'title'        => '火影忍者疾风传',
				'url'          => 'http://www.tv-tokyo.co.jp/anime/naruto/',
				'img'          => '/wp-content/uploads/2023/06/2782_z3jWE.jpg',
				'progress'     => 100,
				'description'  => '《火影忍者-疾风传》主要是描述漩涡鸣人与自来也出外修行两年半之后的故事。
				现在晓所说的三年期限已经到了，各成员们已开始行动，并陆续亮相，与主角们展开最激烈的战斗……
				不知不觉《火影忍者》已经一路走了七年，鸣人从万年吊车尾的倒霉蛋慢慢地成长为能独当一面的忍者。从莽撞单纯的英雄主义男主角一步又一步地向忍道的达人迈进。为了友情，为了爱，为了被认可，为了自己的忍道，鸣人头也不回的奋斗了整整7年，以疾风的速度成长着。撒花庆贺的同时好消息自然不能少！2007早春火影动画也回归漫画突入第二章，冗长乏味的TV动画，终于顺应民意走回“正途”。
				疾风传指的是佐助投奔大蛇丸后三年发生的故事，故疾风传也可以理解为《火影忍者》第二部。',
				'type'         => '番剧',
				'project'      => '岸本斉史',
				'date'         => '2007年2月15日',
				'been_episode' => '已看完',
				'all_episode'  => '全500话',
			],
			[
				'title'        => '东京喰种',
				'url'          => 'http://www.maql.co.jp/special/tokyoghoul/',
				'img'          => '/wp-content/uploads/2023/06/93714_r1U22.jpg',
				'progress'     => 100,
				'description'  => '在纷乱嘈杂的现代化城市——东京，蔓延着一种吞食死尸的怪人，人们称之为喰种。
				那一日，金木研——上井大学的一名普通学生——遇上了某位神秘女子，进而卷入了一场迷之事故。
				自此，充满波折的命运齿轮开始转动了……',
				'type'         => '番剧',
				'project'      => 'ぴえろ',
				'date'         => '2014年7月3日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '东京喰种√A',
				'url'          => 'http://www.marv.jp/special/tokyoghoul/',
				'img'          => '/wp-content/uploads/2023/06/115292_RnE82.jpg',
				'progress'     => 100,
				'description'  => '「 悲劇、2周目。｣
				人間の死肉を喰らう怪人“喰種”が潜む街――東京。
				大学生のカネキは、ある事故がきっかけで“喰種”の内臓を移植され、半“喰種”となる。
				人を喰らわば生きていけない、だが喰べたくはない。
				人間と“喰種”の狭間で、もがき苦しむカネキ。
				どちらの世界にも「居場所」が無い、
				そんな彼を受け入れたのは“喰種”芳村が経営する喫茶店「あんていく」だった。
				そしてカネキは自らが“喰種”と人間、
				ふたつの世界に「居場所」を持てる唯一人の存在であると知る。
				互いが歪めた世界を正すため、
				カネキは“喰種”と人間の想いが交錯する迷宮へと立ち入るが…。
				――僕は“喰種”だ――
				全てを守れる「強さ」を欲したカネキが取った究極の選択は、
				自らの人間的な部分を葬り“喰種”として生きることだった。
				走り出してしまった決意。暴走する優しさ。
				「強さ」の果てに、カネキが見たものとは…？
				原作者・石田スイが紡ぎ出す、もうひとつの「東京喰種」が幕を開ける。',
				'type'         => '番剧',
				'project'      => 'ぴえろ',
				'date'         => '2015年1月8日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '东京喰种 JACK',
				'url'          => 'http://www.marv.jp/special/tokyoghoul/first/products_ova.html#filter=.jack',
				'img'          => '/wp-content/uploads/2023/06/129687_m168X.jpg',
				'progress'     => 100,
				'description'  => '由CCG发起的对「枭」的讨伐战的12年前—。
				东京13区内，名为「灯笼」的食尸鬼频频捕食人类，成为了CCG的搜查目标。
				高中生·富良太志，受因为伤痛而无法继续打棒球的挫折的影响，与曾经的队友兼挚友的阿凉与阿秋一起做起了不良少年。
				后来，与阿凉交恶的太志离开了两人，开始了独自行动。凉与秋虽然担心着太志，但也难以向太志启齿表明。
				某一日深夜，与不良集团在一起的凉与秋被「灯笼」所袭击。正巧经过的太志，想要救助两人却敌不过食尸鬼。这时，同班同学·有马贵将出现了——',
				'type'         => '番剧',
				'project'      => 'ぴえろ',
				'date'         => '2015年9月30日',
				'been_episode' => '已看完',
				'all_episode'  => '全1话',
			],
			[
				'title'        => '东京喰种 PINTO',
				'url'          => 'http://www.marv.jp/special/tokyoghoul/products_ova.html#filter=.pinto',
				'img'          => '/wp-content/uploads/2023/06/140634_BnQN9-2.jpg',
				'progress'     => 100,
				'description'  => '在与金木和利世相遇的数年前——。追求“美食”的月山习的捕食瞬间被高中同级生·掘千绘拍了个正着。
				但是，掘千绘并不惧怕“食尸鬼”月山，只是喜悦于拍摄到了最为精彩的一瞬间。
				被打乱了节奏的月山，虽然就此动了兴趣开始接触摄影少女·掘千绘，但作为“美食家”身份的食指却没有动作。
				而后，月山向掘千绘发了「晚餐会」的请柬，想要借此一览这位女孩的本质…。',
				'type'         => '番剧',
				'project'      => 'ぴえろ',
				'date'         => '2015年12月25日',
				'been_episode' => '已看完',
				'all_episode'  => '全1话',
			],
			[
				'title'        => '东京喰种:re',
				'url'          => 'http://www.marv.jp/special/tokyoghoul/',
				'img'          => '/wp-content/uploads/2023/06/148481_v7x7A.jpg',
				'progress'     => 100,
				'description'  => '混杂于群众之中，以人类的肉为食。拥有人类的形态，却与人类不同的存在……“喰种”。
				对“喰种”进行驱逐、研究的CCG，为了达成某个命题，而新设了实验体集团。
				——其名为“Quinx”。
				并非“正经人类”的他们，与佐佐木琲世一等搜查官一起在“东京”面对的事物究竟是——！？
				描绘《东京食尸鬼√A》2年后的新章《东京食尸鬼:re》终于启动。',
				'type'         => '番剧',
				'project'      => 'ぴえろ',
				'date'         => '2018年4月3日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '东京喰种:re 第二季',
				'url'          => 'http://www.marv.jp/special/tokyoghoul/',
				'img'          => '/wp-content/uploads/2023/06/244878_i6FE9.jpg',
				'progress'     => 100,
				'description'  => '混杂于群众之中，以人类的肉为食。拥有人类的形态，却与人类不同的存在……“喰种”。
				在对“喰种”进行驱逐、研究的“CCG”，曾经率领“Quinx”小组的喰种搜查官“佐佐木琲世”。他正是行踪不明的眼罩喰种“金木研”。
				另一方面，在成立了新体制的“CCG”，以旧多二福为中心，不安定的行动终于表面化……
				与“金木研”有关的故事，终于迈向最终章——。',
				'type'         => '番剧',
				'project'      => 'ぴえろ',
				'date'         => '2018年10月9日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '总之就是非常可爱',
				'url'          => 'http://tonikawa.com/',
				'img'          => '/wp-content/uploads/2023/06/301541_p2z4K.jpg',
				'progress'     => 100,
				'description'  => '由崎星空对神秘美少女——司一见钟情。
				面对星空决死的告白，她的回答是“如果你愿意和我结婚，那我就跟你交往”？！
				充满了星空与司的爱，可爱&高贵的新婚生活开始了！！',
				'type'         => '番剧',
				'project'      => 'トニカクカワイイ製作委員会',
				'date'         => '2020年10月2日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '五等分的新娘',
				'url'          => 'http://www.tbs.co.jp/anime/5hanayome/1st',
				'img'          => '/wp-content/uploads/2023/06/256114_mvRVq.jpg',
				'progress'     => 100,
				'description'  => '一直过着贫困生活的高中二年级学生·上杉风太郎，找到了一份条件非常好的家庭教师兼职。
				然而，要教导的学生居然是同级生！而且还是五胞胎！！
				虽然都是美少女，但同时也是“将要留级”、“讨厌学习”的问题学生们！最开始的任务就是要取得这些女孩们的信任……！？每天都热闹喧嚣！
				中野家的五姐妹所带来的可爱度500%的五个不一样的恋爱喜剧，就此开幕！！',
				'type'         => '番剧',
				'project'      => 'ZERO-A',
				'date'         => '2019年1月10日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '五等分的新娘∬',
				'url'          => 'https://www.tbs.co.jp/anime/5hanayome/2nd',
				'img'          => '/wp-content/uploads/2023/06/282000_6HHwK.jpg',
				'progress'     => 100,
				'description'  => '面对“将要留级”、“讨厌学习”的美少女五姐妹，身为兼职家庭教师的风太郎要指导她们学习，直到“顺利毕业”为止。
				经历了林间学校中发生的许多事情后，风太郎与五姐妹的信赖进一步加深。
				想要在作为家庭教师的事业上迈进的风太郎本打算在这次的考试中要让五姐妹的成绩全都及格，结果却频频遇到各种麻烦。
				不仅如此，风太郎的初恋对象“照片里的女孩”也出现了……
				风太郎与五姐妹之间新的考验开幕——',
				'type'         => '番剧',
				'project'      => 'TBS',
				'date'         => '2021年1月7日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '进击的巨人',
				'url'          => 'http://shingeki.tv',
				'img'          => '/wp-content/uploads/2023/06/55770_HsJfh.jpg',
				'progress'     => 100,
				'description'  => '悠长的历史之中,人类曾一度因被巨人捕食而崩溃。
				幸存下来的人们建造了一面巨大的墙壁,防止了巨人的入侵。
				不过,作为“和平”的代价,人类失去了到墙壁的外面去这一“自由”。
				主人公艾伦·耶格尔对还没见过的外面的世界抱有兴趣。
				在他正做着到墙壁的外面去这个梦的时候,毁坏墙壁的大巨人出现了！',
				'type'         => '番剧',
				'project'      => '諫山創',
				'date'         => '2013年4月6日',
				'been_episode' => '已看完',
				'all_episode'  => '全25话',
			],
			[
				'title'        => '进击的巨人 无悔的选择 OAD',
				'url'          => 'http://shingeki.tv',
				'img'          => '/wp-content/uploads/2023/06/110049_bV5g9.jpg',
				'progress'     => 100,
				'description'  => '外传「进击的巨人 无悔的选择」OAD化决定！
				「进击的巨人」单行本第15、16卷同捆OAD。
				讲述了利威尔与调查兵团的团长艾尔文两人相遇的故事。',
				'type'         => '番剧',
				'project'      => '諫山創',
				'date'         => '2014年12月9日',
				'been_episode' => '已看完',
				'all_episode'  => '全2话',
			],
			[
				'title'        => '进击的巨人 第二季',
				'url'          => 'http://shingeki.tv/season2/',
				'img'          => '/wp-content/uploads/2023/06/118335_xicxP.jpg',
				'progress'     => 100,
				'description'  => '自从人类的和平被超大型巨人打破的那天起，艾伦·耶格尔便每天持续着没有尽头的战斗...。
				因为眼睁睁看著母亲被巨人撕裂，艾伦发誓要将世间的巨人一只不留地杀灭。
				但是，在严酷的战斗中，艾伦自身也会变成巨人的姿态——为了人类的自由，艾伦施展著巨人的力量，并和女人型的巨人发生了冲突。
				巨人间的战斗中艾伦最终得以胜出。巨人不断地造访，下一轮的战斗已经宣告开始。对于接连而来的巨人，人类将如何去面对！？',
				'type'         => '番剧',
				'project'      => '諫山創',
				'date'         => '2017年4月1日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '进击的巨人 第三季',
				'url'          => 'https://shingeki.tv/season3/',
				'img'          => '/wp-content/uploads/2023/06/217300_WGgTy.jpg',
				'progress'     => 100,
				'description'  => '历经百年的时光，将人类与外侧世界隔开的墙壁。在墙壁的另一侧，似乎有前所未见的世界延伸开来。
				火焰之水、冰之大地、砂之雪原……记载在书中的，尽是些激发少年探究心的文字。
				在时间流转，墙壁被巨人毁坏的现在，人类正一步步接近世界的真相。巨人的真实身份是什麽？为何墙壁中会埋著巨人？
				巨人化的艾伦·耶格尔所持有的“坐标”之力是？以及，希斯特莉亚·雷斯究竟知道这个世界的什麽事情？在艾伦等104期兵的加入下，建立新体制的利威尔班。
				最强最恶的敌人，阻拦在开始行动的他们面前。',
				'type'         => '番剧',
				'project'      => '諫山創',
				'date'         => '2018年7月22日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '进击的巨人 第三季 Part.2',
				'url'          => 'https://shingeki.tv/season3/',
				'img'          => '/wp-content/uploads/2023/06/263750_56TBs.jpg',
				'progress'     => 100,
				'description'  => '历经百年的时光，将人类与外侧世界隔开的墙壁。在墙壁的另一侧，似乎有前所未见的世界延伸开来。
				火焰之水、冰之大地、砂之雪原……记载在书中的，尽是些激发少年探究心的文字。在时间流转，墙壁被巨人毁坏的现在，人类正一步步接近世界的真相。
				巨人的真实身份是什麽？为何墙壁中会埋著巨人？巨人化的艾伦·耶格尔所持有的“坐标”之力是？以及，希斯特莉亚·雷斯究竟知道这个世界的什麽事情？
				在艾伦等104期兵的加入下，建立新体制的利威尔班。最强最恶的敌人，阻拦在开始行动的他们面前。',
				'type'         => '番剧',
				'project'      => '諫山創',
				'date'         => '2019年4月28日',
				'been_episode' => '已看完',
				'all_episode'  => '全10话',
			],
			[
				'title'        => '进击的巨人 最终季',
				'url'          => 'https://shingeki.tv/final/',
				'img'          => '/wp-content/uploads/2023/06/285666_ad2Az.jpg',
				'progress'     => 100,
				'description'  => '「その巨人はいついかなる時代においても、自由を求めて進み続けた。自由のために戦った。名は――進撃の巨人」
				ついに明かされた壁の外の真実と、巨人の正体。ここに至るまで、人類はあまりにも大きすぎる犠牲を払っていた。それでもなお、彼らは進み続けなければならない。壁の外にある海を、自由の象徴を、まだその目で見ていないのだから。
				――やがて時は流れ、一度目の「超大型巨人」襲来から6年。調査兵団はウォール・マリア外への壁外調査を敢行する。
				「壁の向こうには海があって、海の向こうには自由がある。ずっとそう信じてた……」
				壁の中の人類が、初めて辿り着いた海。果てしなく広がる水平線の先にあるのは自由か、それとも……？',
				'type'         => '番剧',
				'project'      => '諫山創',
				'date'         => '2020年12月6日',
				'been_episode' => '已看完',
				'all_episode'  => '全16话',
			],
			[
				'title'        => '进击的巨人 最终季 Part.2',
				'url'          => 'https://shingeki.tv/final',
				'img'          => '/wp-content/uploads/2023/06/331752_iRPHK.jpg',
				'progress'     => 100,
				'description'  => 'ついに明かされた壁の外の真実と、巨人の正体。
				ここに至るまで、人類はあまりにも大きすぎる犠牲を払っていた。
				それでもなお、彼らは進み続けなければならない。
				壁の外にある海を、自由の象徴を、まだその目で見ていないのだから。
				—やがて時は流れ、一度目の「超大型巨人」襲来から６年。
				調査兵団はウォール・マリア外への壁外調査を敢行する。
				「壁の向こうには海があって、海の向こうには自由がある。
				ずっとそう信じてた……」
				壁の中の人類が、初めて辿り着いた海。
				果てしなく広がる水平線の先にあるのは自由か、それとも……？
				エレン・イェーガーの物語は、新たな局面を迎える。',
				'type'         => '番剧',
				'project'      => '諫山創',
				'date'         => '2022年1月9日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '进击的巨人 最终季 完结篇 前篇',
				'url'          => 'https://shingeki.tv/final',
				'img'          => '/wp-content/uploads/2023/06/376739_KMN9x.jpg',
				'progress'     => 100,
				'description'  => '世界を滅ぼそうと「地鳴らし」を発動させたエレン。無数の巨人たちが進撃を開始し、あらゆるものを踏み潰していく。
				ミカサ、アルミン、ジャン、コニー、ハンジ、ライナー、アニ、ピーク、そして瀕死の重傷を負ったリヴァイ……。残されたものたちがエレンを止めるため最後の戦いに挑む。',
				'type'         => '番剧',
				'project'      => '諫山創',
				'date'         => '2023年3月3日',
				'been_episode' => '已看完',
				'all_episode'  => '全1话',
			],
			[
				'title'        => '侦探已经死了。',
				'url'          => 'https://tanmoshi-anime.jp',
				'img'          => '/wp-content/uploads/2023/06/325727_vvez2.jpg',
				'progress'     => 100,
				'description'  => '“你来做我的助手吧。”
				有着被卷入事件体质的少年・君冢君彦，在高空一万米的飞机中成为了自称是侦探的天使般的美丽少女・希耶丝塔的助手。两个人为了同世界各地的敌人战斗，三年来在世界各地飞来飞去，展开了令人目眩的冒险旅程。——不久之后，侦探就去世了。
				动荡的日子已经过去了一年。已成为高中三年级学生的君冢也沉溺在了名为日常的温水中，过着极其普通的学生生活。在这样的君冢身边出现了一个委托人。
				“你是名侦探？”
				以和同年级的少女夏凪渚相遇为契机，连接过去和现在的壮大故事再次开始了——',
				'type'         => '番剧',
				'project'      => 'ENGI',
				'date'         => '2021年7月4日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '致不灭的你',
				'url'          => 'https://anime-fumetsunoanatae.com',
				'img'          => '/wp-content/uploads/2023/06/297954_NyA7J.jpg',
				'progress'     => 100,
				'description'  => '不死起初是一个被投放到人世间的“球”。
				它具有“幻化为刺激源形态的能力”和“死后重生的能力”。虽然不死不断变换着自己的姿态，先后从球体变成小石块、狼以及少年，但却像一无所知的新生儿一样迷茫、徘徊。
				逐渐地，不死从相知相遇的人们那里学到了生存技能，体味到人间温情，于是踏上了人类那样的成长之路。
				等待不死的是与宿敌·敲门人的壮烈战斗，与深爱之人的离别……不死忍受着痛苦摸索前进方向，在永恒的旅途中一步一步坚定地走下去。',
				'type'         => '番剧',
				'project'      => 'NHKエンタープライズ',
				'date'         => '2021年4月12日',
				'been_episode' => '已看完',
				'all_episode'  => '全20话',
			],
			[
				'title'        => '辉夜大小姐想让我告白～天才们的恋爱头脑战～',
				'url'          => 'http://kaguya.love/',
				'img'          => '/wp-content/uploads/2023/06/248175_2w4zT.jpg',
				'progress'     => 100,
				'description'  => '家庭背景与人品都很棒！！一大群有前途的秀才所聚集的秀知院学园！！
				在那里的学生会相遇的副会长·四宫辉夜与会长·白银御行原本应该是彼此受到了对方吸引…但想不到都过半年了却仍然什么事情也没发生！！
				最麻烦的是这两个自尊心超强、无法坦率的家伙，居然开始想着要“设法让对方向自己告白”！？
				直到恋情有下落之前会很欢乐的故事！！新感觉“斗智”爱情喜剧、就此开战！！',
				'type'         => '番剧',
				'project'      => 'Aniplex',
				'date'         => '2019年1月12日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '辉夜大小姐想让我告白？～天才们的恋爱头脑战～',
				'url'          => 'http://kaguya.love/',
				'img'          => '/wp-content/uploads/2023/06/293049_0e0re.jpg',
				'progress'     => 100,
				'description'  => '人才云集的精英校·秀知院学园，在该校的学生会相遇的副会长·四宫辉夜与学生会长·白银御行。
				无论任何人都认为十分般配的这两位天才，本以为很快就会喜结良缘，但碍于过高的自尊心而仍然未能告白！
				“如何让对方告白”在这样的恋爱头脑战中穷尽智略的两人……
				其罕有的知性热失控！已经完全无法控制！
				恋爱让天才变成傻瓜！
				新感觉“头脑战”？恋爱喜剧，再次开战！',
				'type'         => '番剧',
				'project'      => 'Aniplex',
				'date'         => '2020年4月11日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '一人之下',
				'url'          => 'http://cn.hitorinoshita.com/',
				'img'          => '/wp-content/uploads/2023/06/175457_rNBX8.jpg',
				'progress'     => 100,
				'description'  => '这个世界是存在异人的。 张楚岚就是一个隐藏在普通人中的异人。
				在生命的前19年中，他一直小心隐藏着自己和别人的不同。直到有一天，神秘少女冯宝宝找上了他。
				从此他被活尸追，被怪人砍，被卷入了前所未见的麻烦之中……',
				'type'         => '国漫',
				'project'      => '绘梦',
				'date'         => '2016年7月8日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '一人之下 第二季',
				'url'          => 'http://cn.hitorinoshita.com/',
				'img'          => '/wp-content/uploads/2023/06/206925_NpRkA.jpg',
				'progress'     => 100,
				'description'  => '这个世界是存在异人的。张楚岚为了解开爷爷和自身的秘密，和冯宝宝一起前往龙虎山天师府参加异人界的盛会——罗天大醮，并与众多异人高手对战。',
				'type'         => '国漫',
				'project'      => '腾讯动漫',
				'date'         => '2017年10月27日',
				'been_episode' => '已看完',
				'all_episode'  => '全24话',
			],
			[
				'title'        => '一人之下3·入世篇',
				'url'          => 'http://cn.hitorinoshita.com/',
				'img'          => 'https://blog.imky.ink/wp-content/uploads/2023/06/285784_4zJ4J.jpg',
				'progress'     => 100,
				'description'  => '罗天大醮之后，王也被武当除名回到了家中，却因为身怀“八奇技-风后奇门”遭人觊觎，家人遭人监视。
				王也万般无奈，在好友诸葛青的建议下向“哪都通”公司的求助，张楚岚携冯宝宝前来破案。张楚岚如何一展身手帮王也抓出幕后黑手？
				诸葛青和王也等人又将有怎样精彩的表现？觊觎“八奇技”的人究竟是谁？《一人之下-入世篇》即将揭晓！',
				'type'         => '国漫',
				'project'      => '腾讯动漫',
				'date'         => '2020年4月24日',
				'been_episode' => '已看完',
				'all_episode'  => '全8话',
			],
			[
				'title'        => '一人之下4 出发！碧游村',
				'url'          => 'http://cn.hitorinoshita.com/',
				'img'          => '/wp-content/uploads/2023/06/312310_d5Zb8.jpg',
				'progress'     => 100,
				'description'  => '《一人之下》讲述了现代城市中一群拥有超能力的异人的故事。
				这些人外表和普通人没有区别，却个个身怀绝技。本季《碧游村》篇为第四季。
				“临时工”华南地区负责人被“临时工”陈朵杀害，其他各地区临时工受到任务去西南捉拿陈朵，但在追捕的路上遇到了来自碧游村的马仙洪…',
				'type'         => '国漫',
				'project'      => '企鹅影视',
				'date'         => '2021年9月24日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '一人之下5 决战！碧游村',
				'url'          => 'http://cn.hitorinoshita.com/',
				'img'          => '/wp-content/uploads/2023/06/360773_XybxI.jpg',
				'progress'     => 100,
				'description'  => '张楚岚、冯宝宝和临时工一行追捕陈朵，来到了碧游村。
				在查清了陈朵杀害廖忠真相的同时，对马仙洪和修身炉的处理也已经箭在弦上。夜黑风高夜，正是放火时，大战一触即发！决战·碧游村篇强势来袭！',
				'type'         => '国漫',
				'project'      => '企鹅影视',
				'date'         => '2022年12月9日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '宅男腐女恋爱真难',
				'url'          => 'http://wotakoi-anime.com/',
				'img'          => '/wp-content/uploads/2023/06/220312_ErRl1.jpg',
				'progress'     => 100,
				'description'  => '桃濑成海是一个深藏腐女属性的OL，不过在情场上十分失意。 而二藤宏嵩是桃濑的青梅竹马，虽然是个彻头彻尾的死宅，但是长着一副英俊的面孔带着酷冷的形象。 
				在桃濑情场失意时作为青梅竹马的二藤迅速拉近了与桃濑的感情距离，一脸淡然的告白之后正式交往……',
				'type'         => '番剧',
				'project'      => '鐘通インベストメント',
				'date'         => '2018年4月12日',
				'been_episode' => '已看完',
				'all_episode'  => '全11话',
			],
			[
				'title'        => '堀与宫村',
				'url'          => 'https://horimiya-anime.com/',
				'img'          => '/wp-content/uploads/2023/06/315069_2zYW6.jpg',
				'progress'     => 100,
				'description'  => '堀京子既是美人又成绩优秀，在学校是班上的中心。但实际上，她代替忙碌的双亲，在放学后直接回家，专注于家务和照顾年幼的弟弟，是个持家型的高中生。某天，受伤的弟弟创太被陌生的男性送回了堀的家里。
				“堀同学”被这样称呼后和他交谈才发现，他实际上是自己的同班同学——班上头号人气女子与阴沉男子相遇后会怎样！？
				恋爱、友情。充满青春气息的超微碳酸系校园生活，就此开幕！',
				'type'         => '番剧',
				'project'      => 'CloverWorks',
				'date'         => '2021年1月9日',
				'been_episode' => '已看完',
				'all_episode'  => '全13话',
			],
			[
				'title'        => '虚构推理',
				'url'          => 'https://kyokousuiri.jp/season1/',
				'img'          => '/wp-content/uploads/2023/06/271687_8jAPf.jpg',
				'progress'     => 100,
				'description'  => '成为“怪异”们的智慧之神，每天都在解决着“怪异”们带来的麻烦的少女·岩永琴子，她一见钟情的对象·樱川九郎，是个让“怪异”都感到畏惧的男人！？
				这样毫不普通的两人，迎战“怪异”们引发的神秘事件的［恋爱×传奇×推理］！！
				两人所面临的诡异事件，以及恋情将会迎来怎样的结局——！？',
				'type'         => '番剧',
				'project'      => 'NAS',
				'date'         => '2020年1月11日',
				'been_episode' => '已看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '你的名字。',
				'url'          => 'http://kiminona.com',
				'img'          => '/wp-content/uploads/2023/06/160209_2UzU8.jpg',
				'progress'     => 100,
				'description'  => '在每千年回归一次的彗星造访过一个月之后的日本。
				某个深山的乡下小镇，女高中生三叶每天都过着忧郁的生活。
				而她烦恼的不光有担任镇长的父亲所举行的选举运动，还有家传神社的古老习俗。
				在这个小小的城镇，周围都只是些爱瞎操心的老人。为此三叶对于大都市充满了憧憬。
				“下辈子就让我成为东京的帅哥吧……！！！”
				然而某一天，自己做了一个变成男孩子的梦。
				这儿有着陌生的房间、陌生的朋友。而眼前出现的则是东京的街道。
				三叶虽然感到困惑，但是能够来到朝思暮想的都市生活，让她觉得神清气爽。
				“不可思议的梦……”
				另一方面在东京生活的男高中生·泷也做了个奇怪的梦。
				他在一个从未去过的深山小镇中，变成了女高中生……
				那么他们体验的梦境到底有什么秘密呢？
				原本不会相遇的两人由此相逢。
				少女和少年奇迹的故事，开始了。',
				'type'         => '电影',
				'project'      => '新海誠',
				'date'         => '2016年8月26日',
				'been_episode' => '已看完',
				'all_episode'  => '106分钟',
			],
			[
				'title'        => '天气之子',
				'url'          => 'https://www.tenkinoko.com',
				'img'          => '/wp-content/uploads/2023/06/269235_Dg6gZ.jpg',
				'progress'     => 100,
				'description'  => '「想要试着去往那道光芒当中」
				高中一年级的夏天。从离岛离家出走，来到东京的帆高。
				他的生活立刻变得困窘，在度过孤独的每一天之后终于找到的工作，
				是为古怪的超自然杂志撰稿。
				如同预示着他接下来的命运一般，连日不断降下雨水。
				此时，在人潮熙熙攘攘的都市一角，帆高遇到了一位少女。
				由于某些缘故，和弟弟两个人一起坚强生活的少女·阳菜。
				她拥有不可思议的能力。
				「呐，现在开始就要放晴了哦」
				雨水逐渐停止，街道笼罩在美丽的光芒中。
				那是，仅仅在心中祈祷，就能让天空放晴的力量——',
				'type'         => '电影',
				'project'      => '新海誠',
				'date'         => '2019年7月19日',
				'been_episode' => '已看完',
				'all_episode'  => '112分钟',
			],
			[
				'title'        => '铃芽之旅',
				'url'          => 'https://suzume-tojimari-movie.jp/',
				'img'          => '/wp-content/uploads/2023/06/362577_Ku9z8.jpg',
				'progress'     => 100,
				'description'  => '生活在日本九州田舍的17岁少女・铃芽遇见了为了寻找“门”而踏上旅途的青年。
				追随着青年的脚步，铃芽来到了山上一片废墟之地，在这里静静伫立着一扇古老的门，仿佛是坍塌中存留的唯一遗迹。
				铃芽仿佛被什么吸引了一般，将手伸向了那扇门……
				不久之后，日本各地的门开始一扇一扇地打开。
				据说，开着的门必须关上，否则灾祸将会从门的那一边降临于现世。
				星星，夕阳，拂晓，误入之境的天空，仿佛溶解了一切的时间。
				在神秘之门的引导下，铃芽踏上了关门的旅途。',
				'type'         => '电影',
				'project'      => '新海誠',
				'date'         => '2022年11月11日',
				'been_episode' => '已看完',
				'all_episode'  => '121分钟',
			],
			[
				'title'        => '灌篮高手',
				'url'          => '',
				'img'          => '/wp-content/uploads/2023/06/1608_3I59P.jpg',
				'progress'     => 100,
				'description'  => '樱木花道，湘北高校一年级生。在初中有被50个女生连续抛弃的历史。
				因第50个女生的一句“我喜欢的是篮球队的小田同学。”而对篮球深恶痛绝。
				上高中不经意被美少女赤木晴子的一句：“你喜欢篮球吗？”又燃起希望。为得到晴子的芳心，花道不顾一切的加入篮球队，并以惊人的速度进步。
				在湘北篮球队中，队长赤木刚宪是一位一直因无良好队友而无法出人头地的DUNK高手。
				然而在这一年初中时已是篮球高手的流川枫，大病初愈的宫城良田，曾误入歧途的初中时MVP三井寿加入湘北篮球队，使赤木队长的称霸全国不再只是梦想。
				在县大赛时，赤木刚宪，流川枫，宫城良田，三井寿和新手樱木花道通力合作，终于拿到全国大赛的入场券。',
				'type'         => '番剧',
				'project'      => '東映アニメーション',
				'date'         => '1993年10月16日',
				'been_episode' => '已看完',
				'all_episode'  => '全101话',
			],
		];
	}

	public function getWantToWatch(): array {
		return [
			[
				'title'        => '博人传-火影次世代-',
				'url'          => 'http://www.tv-tokyo.co.jp/anime/boruto/',
				'img'          => '/wp-content/uploads/2023/06/202661_Xx5X3.jpg',
				'progress'     => 90,
				'description'  => '和平的同时也在飞速近代化的木叶村。
				高楼耸立、巨大荧屏中播放着影像、链接区域与区域之间的电车在村中驰骋。
				虽说是忍者之村普通人也开始增加、忍者们的生活方式也发生改变的那个时代……村子的头目，七代目火影漩涡鸣人的儿子博人，进入了培育忍者的忍者学校学习。
				周围的同学们都带着“火影之子”的偏见来看待他、博人则用他史无前例的天赋踢飞这些偏见！
				博人遇到了新的同伴、并且向迷之突发事件进行挑战？在大家心目中犹如疾风般长驱直入的“漩涡博人”的故事现在、开始!!',
				'type'         => '番剧',
				'project'      => '池本幹雄',
				'date'         => '2017年4月5日',
				'been_episode' => '未看完',
				'all_episode'  => '全293话',
			],
			[
				'title'        => '斗破苍穹 第五季',
				'url'          => '',
				'img'          => '/wp-content/uploads/2023/06/345781_60ijb.jpg',
				'progress'     => 90,
				'description'  => '三年之约后，萧炎终于在迦南学院见到了薰儿，此后他广交挚友并成立磐门；为继续提升实力以三上云岚宗为父复仇，他以身犯险深入天焚炼气塔吞噬陨落心炎……',
				'type'         => '国漫',
				'project'      => '天蚕土豆',
				'date'         => '2022年7月31日',
				'been_episode' => '未看完',
				'all_episode'  => '全52话',
			],
			[
				'title'        => '鬼灭之刃 无限列车篇',
				'url'          => 'https://kimetsu.com/anime/mugenresshahen_tv/',
				'img'          => '/wp-content/uploads/2023/06/350764_Aibau.jpg',
				'progress'     => 0,
				'description'  => '第1話は、煉獄杏寿郎が鬼殺隊本部を旅立ち無限列車へと向かう道中の任務を描いた完全新作エピソード。
				第2話～第7話は、無限列車での任務を、新作追加映像、新主題歌映像などと共に描きます。',
				'type'         => '番剧',
				'project'      => 'Aniplex',
				'date'         => '2021年10月10日',
				'been_episode' => '未看完',
				'all_episode'  => '全7话',
			],
			[
				'title'        => '鬼灭之刃 游郭篇',
				'url'          => 'https://kimetsu.com/anime/yukakuhen',
				'img'          => '/wp-content/uploads/2023/06/328195_kGv1r.jpg',
				'progress'     => 0,
				'description'  => '结束了无限列车的任务，炭治郎前往下一个任务地点。与鬼杀队最强之一的音柱·宇髄天元一同前往鬼所栖身的游郭之中。新的战斗即将开幕。',
				'type'         => '番剧',
				'project'      => 'Aniplex',
				'date'         => '2021年12月5日',
				'been_episode' => '未看完',
				'all_episode'  => '全11话',
			],
			[
				'title'        => '路人女主的养成方法',
				'url'          => 'http://www.saenai.tv/1st/',
				'img'          => '/wp-content/uploads/2023/06/100403_JFsXn.jpg',
				'progress'     => 1,
				'description'  => '春假时，为了购买动画蓝光片而打工的御宅族安艺伦也，在开满樱花的坡道上邂逅一位少女，帮她捡一顶被风吹走的帽子。
				于是有了以该少女为女主角制作同人游戏的构想。一个月后，才知道该少女是他的同班同学，名叫加藤惠。
				为了制作游戏，安艺伦也还要说服同年级美术部的绘画高手泽村·史宾瑟·英梨梨，以及优等生学姐霞之丘诗羽和加藤惠共组同人游戏社团，开始同人游戏的制作。
				之后又有波岛出海及擅长音乐的冰堂美智留等人的加入。',
				'type'         => '番剧',
				'project'      => '富士見書房',
				'date'         => '2015年1月8日',
				'been_episode' => '未看完',
				'all_episode'  => '全13话',
			],
			[
				'title'        => '徒然喜欢你',
				'url'          => 'http://tsuredure-project.jp',
				'img'          => '/wp-content/uploads/2023/06/208754_JyZ00.jpg',
				'progress'     => 35,
				'description'  => '故事讲述了青梅竹马之间、学生会长与不良少女之间、前辈与后辈之间、同学之间等多种不同角色的恋爱群像剧。',
				'type'         => '番剧',
				'project'      => 'NAS',
				'date'         => '2017年7月4日',
				'been_episode' => '未看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '月色真美',
				'url'          => 'http://tsukigakirei.jp/',
				'img'          => '/wp-content/uploads/2023/06/207573_95N29.jpg',
				'progress'     => 75,
				'description'  => '茜与小太郎。
				初三时第一次被分到同班，相识的两人。
				同班同学、社团伙伴、教师、父母……与周围的关联，自己的成长。
				在那个一边被变化与不安追着，一边慌慌张张地向前飞奔的季节之中，稚嫩而又令人眩目的青春期之恋。',
				'type'         => '番剧',
				'project'      => 'feel.',
				'date'         => '2017年4月6日',
				'been_episode' => '未看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '总之就是非常可爱 第二季',
				'url'          => 'http://tonikawa.com/',
				'img'          => '/wp-content/uploads/2023/06/355798_bZmZ5.jpg',
				'progress'     => 0,
				'description'  => '「一人では形をなさぬ　二人の愛を誓い合うんだ」
				運命の出会いからのプロポーズ、ボロアパートの新婚生活、結婚指輪に両親への挨拶からのアパート全焼にもめげず、昭和な家屋で愛を深めていく新婚のふたり……だんな様の名前は由崎星空（ナサ）、お嫁さんの名前は司。
				トニカク可愛いお嫁さんと、ときめき、うきうきがいっぱいの新婚生活は、お世話になっている有栖川家の綾と要、だまされやすい純真な少女・千歳とメイドたち、そして新たに登場する素敵な友人たちを迎え、さらに賑やかに！さてさて、ふたりの結婚式はどうなることやら！？
				2022年画業20周年を迎え、その筆がますます冴えわたる畑健二郎・原作、小学館「週刊少年サンデー」にて絶賛連載中！人は何故、結婚するのか――トニカク可愛い、そして尊い、珠玉のエピソードが満載！全世界にカワイイとトウトイを拡散した大ヒットアニメ、第2期シリーズ！',
				'type'         => '番剧',
				'project'      => 'Seven Arcs',
				'date'         => '2023年4月7日',
				'been_episode' => '未看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '虚构推理 第二季',
				'url'          => 'https://kyokousuiri.jp',
				'img'          => '/wp-content/uploads/2023/06/320839_3sL1e.jpg',
				'progress'     => 25,
				'description'  => '被称为“鬼怪”的生物，如理所当然般真实存在于世。
				少女岩永琴子作为鬼怪们的“智慧之神”，今天也有鬼怪找她排忧解难。琴子身边有一名连鬼怪都畏惧不已的男子，那就是她一见钟情的恋人，名叫樱川九郎。
				本片讲述这两个不普通的人齐心协力，使用【虚构】解决鬼怪引起的超常悬疑事件的故事。
				他们要如何解决天方夜谭般的新事件，二人的恋情有会有怎样的进展？！
				[恋爱×灵异×悬疑] 回归！！',
				'type'         => '番剧',
				'project'      => 'NAS',
				'date'         => '2023年1月8日',
				'been_episode' => '未看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '擅长捉弄的高木同学',
				'url'          => 'http://takagi3.me/',
				'img'          => '/wp-content/uploads/2023/06/219200_wFT9i.jpg',
				'progress'     => 0,
				'description'  => '“今天一定要捉弄高木同学，让她害羞！”
				某所中学，在各种方面都被邻座的女生高木同学捉弄的男生西片。
				他为了对此反击而每天奋斗，但……？
				这样的高木同学与西片带来的全力“捉弄”青春大战开始了！',
				'type'         => '番剧',
				'project'      => 'シンエイ動画',
				'date'         => '2018年1月8日',
				'been_episode' => '未看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '魔法禁书目录',
				'url'          => 'http://toaru-project.com/index_1_2/',
				'img'          => '/wp-content/uploads/2023/06/1014_nqAH8.jpg',
				'progress'     => 83,
				'description'  => '自己的阳台栏杆上出现了像被单一样挂在上面的少女，这种非现实的情节出现在了上条当麻的眼前。
				虽然在这个城市——最先进科学引导的学院都市中，超能力已经可以通过科学技术创造出来，但是眼前这位自称“茵蒂克丝”的少女还是把上条当麻吓了一条。
				茵蒂克丝自称因拥有十万三千本魔导书而被魔法师追杀，而上条当麻靠自己的超能力也认定了少女的魔法。
				少女以危险为由离开上条家，上条如往日一般去学校学习，但放学回家，却发现茵蒂克丝倒在血泊之中。
				在科学与魔术交叉的世界中，上条当麻与茵蒂克丝的故事开始了。',
				'type'         => '番剧',
				'project'      => 'J.C.STAFF',
				'date'         => '2008年10月4日',
				'been_episode' => '未看完',
				'all_episode'  => '全24话',
			],
			[
				'title'        => '约会大作战 第四季',
				'url'          => 'https://date-a-live4th-anime.com',
				'img'          => '/wp-content/uploads/2023/06/302128_82c5B.jpg',
				'progress'     => 0,
				'description'  => '伴随着前所未有的灾难“空间震”，从邻界现身的少女们――精灵。
				她们拥有的强大能力足以匹敌灾祸，使人类不断地疲于应付。
				要对抗精灵，人类能选择的手段，是用武力消灭精灵，或是――
				“与精灵约会，使其娇羞！”
				亲吻因娇羞让好感度达到MAX的精灵，便能封印她们的灵力，并转换成自己的力量――这是五河士道拥有的特异能力。过于强大的灵力是将精灵们卷入斗争漩涡的元凶，士道通过对灵力进行抑制，时而为了守护她们使用这份力量，陆续拯救了夜刀神十香等精灵们。
				自从精灵首次出现在人类面前，已过数十年。人类与精灵的关系与应对方法也暗地里产生变化…...
				被士道拯救的一个个精灵们、尚未出现的精灵们，
				还有，采取不同于士道所属＜拉塔托斯克＞的手段，和精灵们对峙的势力。
				打破了短暂的宁静……
				士道与精灵的战争（约会），又要开始了―—',
				'type'         => '番剧',
				'project'      => 'GEEKTOYS',
				'date'         => '2022年4月8日',
				'been_episode' => '未看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '某科学的超电磁炮',
				'url'          => 'http://toaru-project.com/railgun/',
				'img'          => '/wp-content/uploads/2023/06/2585_pn2eP.jpg',
				'progress'     => 0,
				'description'  => '故事发生在面积占据东京都的三分之一，居住着230万名人口且其中八成人口是学生的巨大都市“学园都市”。学园都市的所有学生均会接受超能力开发，借由药物、催眠术与通电刺激等方式取得超能力。能力者以范围和威力分为LV0至LV5。
				主角御坂美琴是学园都市中仅七位LV5（超能力者）的其中一人，排行第三。她是拥有操纵电击能力的“电击使”，站在电击能力的顶峰，因而被称为“超电磁炮”。
				本作不但通过美琴的视角来描绘学园都市的平常而不平凡的日常生活，也叙述了学园都市秘密进行非人道性质的实验，从而使大家对于本作及本篇《魔法禁书目录》的背景（世界观）的认识也慢慢变得清楚。',
				'type'         => '番剧',
				'project'      => 'J.C.STAFF',
				'date'         => '2009年10月2日',
				'been_episode' => '未看完',
				'all_episode'  => '全24话',
			],
			[
				'title'        => '宇崎学妹想要玩！',
				'url'          => 'https://uzakichan.com/',
				'img'          => '/wp-content/uploads/2023/06/299498_PNyTT.jpg',
				'progress'     => 0,
				'description'  => '性格有些孤僻喜爱安静的大学三年级生，樱井真一。
				总是被小一届，同高中毕业的学妹宇崎花，以各种照顾爱耍孤僻的学长的名义为由，进行各种无厘头的纠缠。
				虽然一开始觉得有点困扰，但却逐渐习惯起来……',
				'type'         => '番剧',
				'project'      => 'ENGI',
				'date'         => '2020年7月10日',
				'been_episode' => '未看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '樱花庄的宠物女孩',
				'url'          => 'http://sakurasou.tv',
				'img'          => '/wp-content/uploads/2023/06/41488_qw09G.jpg',
				'progress'     => 0,
				'description'  => '就读水明艺术大学附属高中的神田空太，一年级夏天时在宿舍养猫，而被校长叫去问话，并要他把猫赶走，不然就搬出宿舍。
				身为爱猫一族的空太，企图反抗权威，结果被撵出宿舍，流落到恶名昭彰的“樱花庄”。 
				隔年春天，随着世界级天才画家椎名真白搬进了樱花庄，空太开始过著被这名缺乏常识的少女耍得团团转的日子',
				'type'         => '番剧',
				'project'      => 'J.C.STAFF',
				'date'         => '2012年10月8日',
				'been_episode' => '未看完',
				'all_episode'  => '全24话',
			],
			[
				'title'        => '我女友与青梅竹马的惨烈修罗场',
				'url'          => 'http://www.oreshura.net/',
				'img'          => '/wp-content/uploads/2023/06/43557_jUaQk.jpg',
				'progress'     => 0,
				'description'  => '主人公季堂锐太是个成绩优秀的高中一年级学生，同时也是个恋爱反对派。
				本来是和像自己妹妹一般的青梅竹马一起过着普通的高中生活的，但某天却被校内公认的第一美人，归国子女夏川真凉表白了。
				然而真凉的真实意图却是为了骗过众人而需要锐太与她假扮情侣。
				被真凉掌握了自己的某个“秘密”的锐太被迫假扮“男友”这一角色……之后“前女友”姬香、“未婚妻”爱衣也加了进来，围绕锐太的壮烈修罗场就此拉开帷幕！',
				'type'         => '番剧',
				'project'      => 'SBクリエイティブ',
				'date'         => '2013年1月5日',
				'been_episode' => '未看完',
				'all_episode'  => '全13话',
			],
			[
				'title'        => '女高中生的无所事事',
				'url'          => 'http://jyoshimuda.com/',
				'img'          => '/wp-content/uploads/2023/06/265708_QDkDe.jpg',
				'progress'     => 0,
				'description'  => '被浪费的青春——
				偏差值差不多的田中（通称“笨蛋”）、沉迷于BL的菊池（通称：“御宅”）、面无表情的才女・鹭宫（通称“机”）。个性十足的女高中生们无所事事的日常校园生活——',
				'type'         => '番剧',
				'project'      => 'パッショーネ',
				'date'         => '2019年7月5日',
				'been_episode' => '未看完',
				'all_episode'  => '全12话',
			],
			[
				'title'        => '小林家的龙女仆',
				'url'          => 'https://maidragon.jp/1st',
				'img'          => '/wp-content/uploads/2023/06/179949_c2j50.jpg',
				'progress'     => 0,
				'description'  => '在单身的辛苦OL小林身边突然出现的女仆装束的美少女托尔。
				长着角和尾巴的她的身姿正是所谓的龙娘。
				在醉酒的小林邀请下说要到家里去的托尔，鬼使神差地开始以小林家女仆的身份工作……！？
				“女仆”+“龙”=“女仆龙”有着笨手笨脚的可爱之处！
				龙娘与人类之间基本上很温暖、偶尔有些黑暗的异种族间交流喜剧！！',
				'type'         => '番剧',
				'project'      => '京都アニメーション',
				'date'         => '2017年1月11日',
				'been_episode' => '未看完',
				'all_episode'  => '全13话',
			],
			[
				'title'        => '辉夜大小姐想让我告白-初吻不会结束-',
				'url'          => 'https://kaguya.love',
				'img'          => '/wp-content/uploads/2023/06/389474_tzbrl.jpg',
				'progress'     => 0,
				'description'  => '两人冻结的内心，在没有下雪的东京夜空渐渐融化。
				爱情喜剧，在特别却又平凡的圣诞节，重新归来 —
				副会长・四宫辉夜与学生会长・白银御行在秀知院学园的学生会相遇，两名天才在历经了漫长的恋爱头脑战后，终于向对方表达了自己的心意，​在“奉心祭”首度接吻。
				然而两人还是没有做出明确的告白，原以为就要成为恋人了，但却依然维持著暧昧关係，反而变得更加在意彼此。
				两人就这么迎向了圣诞节，“渴望变得完美”的白银，与追求他的“不完美”的辉夜，这是天才们极其“普通”的恋爱故事。
				初吻，永不结束 —',
				'type'         => '番剧',
				'project'      => 'A-1 Pictures',
				'date'         => '2022年12月17日',
				'been_episode' => '未看完',
				'all_episode'  => '全1话',
			],
			[
				'title'        => '欢迎来到实力至上主义教室 第二季',
				'url'          => 'http://you-zitsu.com/',
				'img'          => '/wp-content/uploads/2023/06/371546_Df9ri.jpg',
				'progress'     => 80,
				'description'  => '東京都高度育成高等学校。
				進学率、就職率100％を誇り、毎月10万円の金銭に相当するポイントが支給される楽園のような学校だが、その内実は一部の成績優秀者のみが好待遇を受けられる実力至上主義の学校だった。
				問題児の集まるDクラスに配属された綾小路清隆は、Aクラス昇格を目指すクラスメイトの堀北鈴音に協力。無人島でのサバイバル試験を終え、豪華客船で束の間の休息を堪能するのだが……。
				そこでは各クラスが入り乱れた新たな特別試験が始まろうとしていた。クラスのためか、グループのためか、あるいは個人のためか――。
				他クラスが不穏な動きを見せる中、まとまりに欠けるDクラスは窮地に立たされる。信頼と疑念の狭間で揺れ動く生徒たちは、真実を看破できるのか。新たな学園黙示録が今、再び幕を開ける。',
				'type'         => '番剧',
				'project'      => 'ラルケ',
				'date'         => '2022年7月4日',
				'been_episode' => '未看完',
				'all_episode'  => '全13话',
			],
		];
	}
}