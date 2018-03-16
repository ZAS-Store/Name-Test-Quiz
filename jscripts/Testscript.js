var token = "";
var uid = "";
var uid1 = "";
var name= "";
var name1= "";
var fname= "";
var fname1= "";
var friends = [];
var friends_id = [
 '10200825166989239', 
 '10202854552643133', 
 '996924803674777', 
 '1120366151313492', 
 '901908059854796', 
 '837755886260202', 
 '820315358022971', 
 '871101189594375', 
 '947365928642368', 
 '890414301005303', 
 '899399340105712', 
 '840104082734893', 
 '859838724101440', 
 '859533657444896', 
 '879037402166420', 
 '937224006336928', 
 '918051378251472', 
 '866670440076834', 
 '860769480657360', 
 '927317927339114', 
 '671592286286347', 
 '784206111698709', 
 '697099593757685', 
 '812764268814072', 
 '768318509932360', 
 '826435477448754', 
 '840517199376611', 
 '882741021818500', 
 '613029492166327', 
 '806617586123487', 
 '551313791674388', 
 '712290632210103', 
 '547865012023300', 
 '691450864317848', 
 '620244611445209', 
 '364132557126320', 
 '786730934767676', 
 '471134793063563', 
 '639038999530557', 
 '1666375720256836', 
 '1685263521692206', 
 '1644193319145618', 
 '531878976949835', 
 '1588462418078576', 
 '1657388987816520', 
 '1593705527555275', 
 '1652602128303254', 
 '619890181479714', 
 '478600828972841', 
 '464361500386894', 
 '461794910642810', 
 '408754052657807', 
 '1451925195121122', 
 '1623430521279790', 
 '494818813999765', 
 '1580973892175479', 
 '410423405812403', 
 '1669023439982416', 
 '372390192967510', 
 '1002114363166162', 
 '1184349044913514', 
 '10204478430666028', 
 '10201017740281513', 
 '10207009751632615', 
 '1022879447736406', 
 '1063418303670314', 
 '970022786362240', 
 '1022938331073424', 
 '872450746124944', 
 '1020198944686872', 
 '901691069867906', 
 '1021167671261938', 
 '951570681555226', 
 '867689346617990', 
 '946499358745723', 
 '936307586428570', 
 '903179236418903', 
 '943270915737104', 
 '956123921121606', 
 '1008420702535528', 
 '10204572673456605', 
 '867853529938488', 
 '845530602200760', 
 '955928281133298', 
 '699431543501115', 
 '577165589065331', 
 '812317762191578', 
 '793666514081736', 
 '819932978102850', 
 '673438912761693', 
 '688611177949039', 
 '489823211168089', 
 '665991940196872', 
 '468847086601040', 
 '1615851678634153', 
 '372401296294580', 
 '1706708806223050', 
 '1681030742128453', 
 '1611945465709898', 
 '1648401842073396', 
 '1615381198709527', 
 '1587628138181761', 
 '1591083491167563', 
 '1569068683356230', 
 '1588445438102283', 
 '1509898625966915', 
 '10204898534722933', 
 '1181518748541098', 
 '891160110937179', 
 '962839057113477', 
 '953240318068761'
 ];
var friend_sex = 'male';
var user_sex = 'male';
var gender = "male";
var realFriends = [];
var connected = false;
var missingPerms = false;
var permsMatched = [];
var permsDeclined = [];
var start = false;
var currentIndex = 0;
var fbShare = 'https://www.facebook.com/sharer/sharer.php?u=';		
var slider_ident = 0;	
var adsg = "";

function add_post_weight(e){
	if("from"in e&&(friend_id=e.from.id,friend_name="name"in e.from?e.from.name:"",type=e.type,friend_id!=uid))
	{
		founded=!1;
		for(j in friends)
			if(friends[j].id==friend_id){
				founded=!0;
				break
			}
			founded||(friend={
				id:friend_id,
				name:friend_name
			},
			friends.push(friend))
	}
}

function add_comments_weight(e){
	if("comments"in e)
		for(i in e.comments.data)
			if(comment=e.comments.data[i],"from"in comment&&(friend_id=comment.from.id,friend_name="name"in comment.from?comment.from.name:"",type="comment",friend_id!=uid)){
				founded=!1;
				for(j in friends)
					if(friends[j].id==friend_id){
						founded=!0;
						break
					}
					founded||(friend={
						id:friend_id,
						name:friend_name
					},
					friends.push(friend))
		}
}

function add_likes_weight(e){
	if("likes"in e)
		for(i in e.likes.data)
			if(like=e.likes.data[i],"id"in like&&(friend_id=like.id,friend_name="name"in like?like.name:"",type="like",friend_id!=uid)){
				founded=!1;
				for(j in friends)if(friends[j].id==friend_id){
					founded=!0;
					break
				}
				founded||(friend={
					id:friend_id,
					name:friend_name},
					friends.push(friend))
			}
}

function sortFriends(){
	return 0==friends.length?(friends.push({
		id:uid,
		name:name}),
		friends):friends.sort(function(e,t){return e.weight>t.weight?1:t.weight>e.weight?-1:0})
}