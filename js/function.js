
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79
80
81
82
83
84
85
86
87
88
89
90
91
92
93
94
95
96
97
98
99
100
101
102
103
104
105
106
107
108
109
110
111
112
113
114
115
116
117
118
119
120
121
122
123
124
125
126
127
128
129
130
131
132
133
134
135
136
137
138
139
140
141
142
143
144
145
146
147
148
149
150
151
152
153
154
155
156
157
158
159
160
161
162
163
164
165
166
167
168
169
170
171
172
173
174
175
176
177
178
179
180
181
182
183
184
185
186
187
188
189
190
191
192
193
194
195
196
197
198
199
200
201
202
203
204
205
206
207
208
209
210
211
212
213
214
215
216
/** code by webdevtrick ( https://webdevtrick.com ) **/
var month = [
	"January",
	"February",
	"March",
	"April",
	"May",
	"June",
	"July",
	"August",
	"September",
	"October",
	"November",
	"December"
];
var weekday = [
	"Sunday",
	"Monday",
	"Tuesday",
	"Wednesday",
	"Thursday",
	"Friday",
	"Saturday"
];
var weekdayShort = [
	"sun",
	"mon",
	"tue",
	"wed",
	"thu",
	"fri",
	"sat"
];
var monthDirection = 0;
 
function getNextMonth() {
	monthDirection++;
	var current;
	var now = new Date();
	if (now.getMonth() == 11) {
		current = new Date(now.getFullYear() + monthDirection, 0, 1);
	} else {
		current = new Date(now.getFullYear(), now.getMonth() + monthDirection, 1);
	}
	initCalender(getMonth(current));
}
 
function getPrevMonth() {
	monthDirection--;
	var current;
	var now = new Date();
	if (now.getMonth() == 11) {
		current = new Date(now.getFullYear() + monthDirection, 0, 1);
	} else {
		current = new Date(now.getFullYear(), now.getMonth() + monthDirection, 1);
	}
	initCalender(getMonth(current));
}
Date.prototype.isSameDateAs = function (pDate) {
	return (
		this.getFullYear() === pDate.getFullYear() &&
		this.getMonth() === pDate.getMonth() &&
		this.getDate() === pDate.getDate()
	);
};
 
function getMonth(currentDay) {
	var now = new Date();
	var currentMonth = month[currentDay.getMonth()];
	var monthArr = [];
	for (i = 1 - currentDay.getDate(); i < 31; i++) {
		var tomorrow = new Date(currentDay);
		tomorrow.setDate(currentDay.getDate() + i);
		if (currentMonth !== month[tomorrow.getMonth()]) {
		break;
		} else {
		monthArr.push({
		date: {
		weekday: weekday[tomorrow.getDay()],
		weekday_short: weekdayShort[tomorrow.getDay()],
		day: tomorrow.getDate(),
		month: month[tomorrow.getMonth()],
		year: tomorrow.getFullYear(),
		current_day: now.isSameDateAs(tomorrow) ? true : false,
		date_info: tomorrow
		}
		});
		}
	}
	return monthArr;
}
 
function clearCalender() {
	$("table tbody tr").each(function () {
		$(this).find("td").removeClass("active selectable currentDay between hover").html("");
	});
	$("td").each(function () {
		$(this).unbind('mouseenter').unbind('mouseleave');
	});
	$("td").each(function () {
		$(this).unbind('click');
	});
	clickCounter = 0;
}
 
function initCalender(monthData) {
	var row = 0;
	var classToAdd = "";
	var currentDay = "";
	var today = new Date();
 
	clearCalender();
	$.each(monthData,
		function (i, value) {
		var weekday = value.date.weekday_short;
		var day = value.date.day;
		var column = 0;
		var index = i + 1;
 
		$(".sideb .header .month").html(value.date.month);
		$(".sideb .header .year").html(value.date.year);
		if (value.date.current_day) {
		currentDay = "currentDay";
        classToAdd = "selectable";
		$(".right-wrapper .header span").html(value.date.weekday);
		$(".right-wrapper .day").html(value.date.day);
		$(".right-wrapper .month").html(value.date.month);
		}
		if (today.getTime() < value.date.date_info.getTime()) {
		classToAdd = "selectable";
 
		}
		$("tr.weedays th").each(function () {
		var row = $(this);
		if (row.data("weekday") === weekday) {
		column = row.data("column");
		return;
		}
		});
		$($($($("tr.days").get(row)).find("td").get(column)).addClass(classToAdd + " " + currentDay).html(day));
		currentDay = "";
		if (column == 6) {
		row++;
		}
		});
	$("td.selectable").click(function () {
		dateClickHandler($(this));
	});
}
initCalender(getMonth(new Date()));
 
var clickCounter = 0;
$(".fa-angle-double-right").click(function () {
	$(".right-wrapper").toggleClass("is-active");
	$(this).toggleClass("is-active");
});
 
function dateClickHandler(elem) {
 
	var day1 = parseInt($(elem).html());
	if (clickCounter === 0) {
		$("td.selectable").each(function () {
		$(this).removeClass("active between hover");
		});
	}
	clickCounter++;
	if (clickCounter === 2) {
		$("td.selectable").each(function () {
		$(this).unbind('mouseenter').unbind('mouseleave');
		});
		clickCounter = 0;
		return;
	}
	$(elem).toggleClass("active");
	$("td.selectable").hover(function () {
 
		var day2 = parseInt($(this).html());
		$(this).addClass("hover");
		$("td.selectable").each(function () {
		$(this).removeClass("between");
 
		});
		if (day1 > day2 + 1) {
		$("td.selectable").each(function () {
		var dayBetween = parseInt($(this).html());
		if (dayBetween > day2 && dayBetween < day1) {
		$(this).addClass("between");
		}
		});
		} else if (day1 < day2 + 1) {
		$("td.selectable").each(function () {
		var dayBetween = parseInt($(this).html());
		if (dayBetween > day1 && dayBetween < day2) {
		$(this).addClass("between");
		}
		});
		}
	}, function () {
		$(this).removeClass("hover");
	});
}
$(".fa-angle-left").click(function () {
	getPrevMonth();
	$(".main").addClass("is-rotated-left");
	setTimeout(function () {
		$(".main").removeClass("is-rotated-left");
	}, 195);
});
 
$(".fa-angle-right").click(function () {
	getNextMonth();
	$(".main").addClass("is-rotated-right");
	setTimeout(function () {
		$(".main").removeClass("is-rotated-right");
	}, 195);
});