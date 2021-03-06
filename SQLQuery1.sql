USE [MS]
GO
/****** Object:  Table [dbo].[ms_workers]    Script Date: 02/25/2018 21:30:34 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ms_workers](
	[wid] [int] IDENTITY(1,1) NOT NULL,
	[wname] [varchar](100) NOT NULL,
	[wdepartment] [int] NOT NULL,
	[wstatus] [varchar](30) NOT NULL,
	[wlaborhours] [float] NOT NULL,
	[wtel] [int] NOT NULL,
 CONSTRAINT [PK__ms_worke__30F153BB4BAC3F29] PRIMARY KEY CLUSTERED 
(
	[wid] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY],
 CONSTRAINT [UQ__ms_worke__247B571B4E88ABD4] UNIQUE NONCLUSTERED 
(
	[wname] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[ms_workers] ON
INSERT [dbo].[ms_workers] ([wid], [wname], [wdepartment], [wstatus], [wlaborhours], [wtel]) VALUES (1, N'John', 3, N'normal', 2, 11111111)
INSERT [dbo].[ms_workers] ([wid], [wname], [wdepartment], [wstatus], [wlaborhours], [wtel]) VALUES (2, N'Peter', 2, N'normal', 8, 32132132)
INSERT [dbo].[ms_workers] ([wid], [wname], [wdepartment], [wstatus], [wlaborhours], [wtel]) VALUES (3, N'Luis', 1, N'normal', 8, 99999999)
INSERT [dbo].[ms_workers] ([wid], [wname], [wdepartment], [wstatus], [wlaborhours], [wtel]) VALUES (4, N'wang', 2, N'vacation', 8, 46546545)
SET IDENTITY_INSERT [dbo].[ms_workers] OFF
/****** Object:  Table [dbo].[ms_users]    Script Date: 02/25/2018 21:30:34 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ms_users](
	[muid] [int] IDENTITY(1,1) NOT NULL,
	[usn] [varchar](20) NOT NULL,
	[pwd] [varchar](32) NOT NULL,
	[avatar] [varchar](300) NOT NULL,
	[email] [varchar](100) NOT NULL,
	[loginfailure] [int] NOT NULL,
	[logintime] [int] NOT NULL,
	[createtime] [int] NOT NULL,
	[updatetime] [int] NOT NULL,
	[token] [varchar](59) NOT NULL,
	[ustatus] [varchar](30) NOT NULL,
	[roleid] [varchar](50) NULL,
	[salt] [varchar](50) NULL,
	[dept] [int] NULL,
 CONSTRAINT [PK__ms_users__79B3401A7F60ED59] PRIMARY KEY CLUSTERED 
(
	[muid] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY],
 CONSTRAINT [UQ__ms_users__DD778C34023D5A04] UNIQUE NONCLUSTERED 
(
	[usn] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[ms_users] ON
INSERT [dbo].[ms_users] ([muid], [usn], [pwd], [avatar], [email], [loginfailure], [logintime], [createtime], [updatetime], [token], [ustatus], [roleid], [salt], [dept]) VALUES (1, N'Jack', N'b74765e1a124a061036631bcba3bd38b', N'/Public/Admin/img/profile_small.jpg', N'', 0, 1519267200, 1519267137, 0, N'C920F0', N'normal', N'1', N'9a0c2', 1)
INSERT [dbo].[ms_users] ([muid], [usn], [pwd], [avatar], [email], [loginfailure], [logintime], [createtime], [updatetime], [token], [ustatus], [roleid], [salt], [dept]) VALUES (2, N'Mana_tech', N'995ac413b007eab36eca50e8b4093cce', N'/Public/Admin/img/profile_small.jpg', N'', 0, 1519267140, 1519283333, 0, N'', N'normal', N'2', N'330c1', 2)
INSERT [dbo].[ms_users] ([muid], [usn], [pwd], [avatar], [email], [loginfailure], [logintime], [createtime], [updatetime], [token], [ustatus], [roleid], [salt], [dept]) VALUES (3, N'Mana4', N'd07c7cb78851b45829cfa4f8298717c1', N'/Public/Admin/img/profile_small.jpg', N'', 0, 0, 1519457850, 1519463540, N'', N'normal', N'2', N'89877', 3)
SET IDENTITY_INSERT [dbo].[ms_users] OFF
/****** Object:  Table [dbo].[ms_task_worker]    Script Date: 02/25/2018 21:30:34 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ms_task_worker](
	[tid] [char](36) NOT NULL,
	[wid] [int] NOT NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
INSERT [dbo].[ms_task_worker] ([tid], [wid]) VALUES (N'2025D6A8-E934-07D9-B158-0C0E17251454', 1)
INSERT [dbo].[ms_task_worker] ([tid], [wid]) VALUES (N'6816E547-A21A-2B7F-851E-117055C057AC', 2)
INSERT [dbo].[ms_task_worker] ([tid], [wid]) VALUES (N'6816E547-A21A-2B7F-851E-117055C057AC', 4)
INSERT [dbo].[ms_task_worker] ([tid], [wid]) VALUES (N'3A83B1DD-3A44-1FFB-8911-CE5A5E84A77B', 2)
INSERT [dbo].[ms_task_worker] ([tid], [wid]) VALUES (N'3A83B1DD-3A44-1FFB-8911-CE5A5E84A77B', 4)
INSERT [dbo].[ms_task_worker] ([tid], [wid]) VALUES (N'3A83B1DD-3A44-1FFB-8911-CE5A5E84A77B', 1)
/****** Object:  Table [dbo].[ms_task]    Script Date: 02/25/2018 21:30:34 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ms_task](
	[tid] [varchar](50) NOT NULL,
	[tname] [varchar](20) NOT NULL,
	[thour] [varchar](32) NOT NULL,
	[tstatus] [varchar](50) NOT NULL,
	[tworker] [varchar](200) NULL,
	[tcreatetime] [int] NULL,
 CONSTRAINT [PK__ms_task__DC105B0F06CD04F7] PRIMARY KEY CLUSTERED 
(
	[tid] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY],
 CONSTRAINT [UQ__ms_task__12601C3E09A971A2] UNIQUE NONCLUSTERED 
(
	[tname] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
INSERT [dbo].[ms_task] ([tid], [tname], [thour], [tstatus], [tworker], [tcreatetime]) VALUES (N'2025D6A8-E934-07D9-B158-0C0E17251454', N'job', N'8', N'not started', N'John', 1519267137)
INSERT [dbo].[ms_task] ([tid], [tname], [thour], [tstatus], [tworker], [tcreatetime]) VALUES (N'3A83B1DD-3A44-1FFB-8911-CE5A5E84A77B', N'sign contract2', N'11', N'not started', N'Peter,wang,John', 1519267137)
INSERT [dbo].[ms_task] ([tid], [tname], [thour], [tstatus], [tworker], [tcreatetime]) VALUES (N'6816E547-A21A-2B7F-851E-117055C057AC', N'project999', N'100', N'not started', N'Peter', 1519267137)
/****** Object:  Table [dbo].[ms_rule]    Script Date: 02/25/2018 21:30:34 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ms_rule](
	[ruleid] [int] IDENTITY(1,1) NOT NULL,
	[ruleurl] [varchar](50) NOT NULL,
	[ruleitem] [varchar](50) NOT NULL,
	[ruleicon] [varchar](100) NOT NULL,
	[rulepid] [int] NOT NULL,
	[ismenu] [char](1) NOT NULL,
 CONSTRAINT [PK__ms_rule__121731A9267ABA7A] PRIMARY KEY CLUSTERED 
(
	[ruleid] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY],
 CONSTRAINT [UQ__ms_rule__E19A158929572725] UNIQUE NONCLUSTERED 
(
	[ruleurl] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[ms_rule] ON
INSERT [dbo].[ms_rule] ([ruleid], [ruleurl], [ruleitem], [ruleicon], [rulepid], [ismenu]) VALUES (1, N'dashboard', N'Dashboard', N'fa fa-dashboard', 0, N'0')
INSERT [dbo].[ms_rule] ([ruleid], [ruleurl], [ruleitem], [ruleicon], [rulepid], [ismenu]) VALUES (2, N'attendance', N'Attendance', N'fa fa-list', 0, N'1')
INSERT [dbo].[ms_rule] ([ruleid], [ruleurl], [ruleitem], [ruleicon], [rulepid], [ismenu]) VALUES (3, N'authority', N'Authority', N'fa fa-group', 0, N'1')
INSERT [dbo].[ms_rule] ([ruleid], [ruleurl], [ruleitem], [ruleicon], [rulepid], [ismenu]) VALUES (4, N'setting', N'Setting', N'fa fa-cogs', 0, N'1')
INSERT [dbo].[ms_rule] ([ruleid], [ruleurl], [ruleitem], [ruleicon], [rulepid], [ismenu]) VALUES (5, N'attendance/record', N'Record', N'fa fa-list-alt', 2, N'0')
INSERT [dbo].[ms_rule] ([ruleid], [ruleurl], [ruleitem], [ruleicon], [rulepid], [ismenu]) VALUES (6, N'attendance/statistics', N'Statistics', N'fa fa-cog', 2, N'0')
INSERT [dbo].[ms_rule] ([ruleid], [ruleurl], [ruleitem], [ruleicon], [rulepid], [ismenu]) VALUES (7, N'authority/admin', N'Admin', N'fa fa-user', 3, N'0')
INSERT [dbo].[ms_rule] ([ruleid], [ruleurl], [ruleitem], [ruleicon], [rulepid], [ismenu]) VALUES (8, N'authority/role', N'Role', N'fa fa-group', 3, N'0')
INSERT [dbo].[ms_rule] ([ruleid], [ruleurl], [ruleitem], [ruleicon], [rulepid], [ismenu]) VALUES (10, N'setting/profile', N'Profile', N'fa fa-circle-o', 4, N'0')
INSERT [dbo].[ms_rule] ([ruleid], [ruleurl], [ruleitem], [ruleicon], [rulepid], [ismenu]) VALUES (11, N'task', N'Task', N'fas fa-briefcase', 0, N'1')
INSERT [dbo].[ms_rule] ([ruleid], [ruleurl], [ruleitem], [ruleicon], [rulepid], [ismenu]) VALUES (12, N'labortime', N'Employee', N'fal fa-clipboard', 0, N'1')
INSERT [dbo].[ms_rule] ([ruleid], [ruleurl], [ruleitem], [ruleicon], [rulepid], [ismenu]) VALUES (13, N'task/taskedit', N'TaskEdit', N'fas fa-briefcase', 11, N'0')
INSERT [dbo].[ms_rule] ([ruleid], [ruleurl], [ruleitem], [ruleicon], [rulepid], [ismenu]) VALUES (14, N'labortime/labortimeedit', N'EmployeeList', N'fal fa-clipboard', 12, N'0')
SET IDENTITY_INSERT [dbo].[ms_rule] OFF
/****** Object:  Table [dbo].[ms_role]    Script Date: 02/25/2018 21:30:34 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ms_role](
	[roid] [int] IDENTITY(1,1) NOT NULL,
	[ropid] [int] NOT NULL,
	[roname] [varchar](50) NOT NULL,
	[rules] [text] NOT NULL,
 CONSTRAINT [PK__ms_role__863D392E3A81B327] PRIMARY KEY CLUSTERED 
(
	[roid] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY],
 CONSTRAINT [UQ__ms_role__6E88FA4B3D5E1FD2] UNIQUE NONCLUSTERED 
(
	[roname] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[ms_role] ON
INSERT [dbo].[ms_role] ([roid], [ropid], [roname], [rules]) VALUES (1, 0, N'superman', N'*')
INSERT [dbo].[ms_role] ([roid], [ropid], [roname], [rules]) VALUES (2, 1, N'manager', N'1,2,4,5,6,10')
INSERT [dbo].[ms_role] ([roid], [ropid], [roname], [rules]) VALUES (3, 2, N'subMana', N'1,5,6,10')
INSERT [dbo].[ms_role] ([roid], [ropid], [roname], [rules]) VALUES (4, 2, N'subMana2', N'1,7,8,10')
SET IDENTITY_INSERT [dbo].[ms_role] OFF
/****** Object:  Table [dbo].[ms_department]    Script Date: 02/25/2018 21:30:34 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ms_department](
	[did] [int] IDENTITY(1,1) NOT NULL,
	[dname] [varchar](100) NOT NULL,
	[dpid] [int] NOT NULL,
	[dstatus] [varchar](30) NOT NULL,
	[dtel] [int] NOT NULL,
 CONSTRAINT [PK__ms_depar__D877D21666603565] PRIMARY KEY CLUSTERED 
(
	[did] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY],
 CONSTRAINT [UQ__ms_depar__6B0C41AD693CA210] UNIQUE NONCLUSTERED 
(
	[dname] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[ms_department] ON
INSERT [dbo].[ms_department] ([did], [dname], [dpid], [dstatus], [dtel]) VALUES (1, N'president', 0, N'normal', 123123123)
INSERT [dbo].[ms_department] ([did], [dname], [dpid], [dstatus], [dtel]) VALUES (2, N'technology', 1, N'normal', 456456456)
INSERT [dbo].[ms_department] ([did], [dname], [dpid], [dstatus], [dtel]) VALUES (3, N'administration', 1, N'normal', 789789789)
SET IDENTITY_INSERT [dbo].[ms_department] OFF
/****** Object:  Default [DF__ms_depart__dname__6B24EA82]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_department] ADD  CONSTRAINT [DF__ms_depart__dname__6B24EA82]  DEFAULT ('') FOR [dname]
GO
/****** Object:  Default [DF__ms_departm__dpid__6C190EBB]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_department] ADD  CONSTRAINT [DF__ms_departm__dpid__6C190EBB]  DEFAULT ((0)) FOR [dpid]
GO
/****** Object:  Default [DF__ms_depart__dstat__6D0D32F4]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_department] ADD  CONSTRAINT [DF__ms_depart__dstat__6D0D32F4]  DEFAULT ('normal') FOR [dstatus]
GO
/****** Object:  Default [DF__ms_departm__dtel__6E01572D]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_department] ADD  CONSTRAINT [DF__ms_departm__dtel__6E01572D]  DEFAULT ((0)) FOR [dtel]
GO
/****** Object:  Default [DF__ms_role__ropid__3F466844]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_role] ADD  CONSTRAINT [DF__ms_role__ropid__3F466844]  DEFAULT ((0)) FOR [ropid]
GO
/****** Object:  Default [DF__ms_role__roname__403A8C7D]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_role] ADD  CONSTRAINT [DF__ms_role__roname__403A8C7D]  DEFAULT ('') FOR [roname]
GO
/****** Object:  Default [DF__ms_role__rules__412EB0B6]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_role] ADD  CONSTRAINT [DF__ms_role__rules__412EB0B6]  DEFAULT ('') FOR [rules]
GO
/****** Object:  Default [DF__ms_rule__ruleurl__2B3F6F97]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_rule] ADD  CONSTRAINT [DF__ms_rule__ruleurl__2B3F6F97]  DEFAULT ('') FOR [ruleurl]
GO
/****** Object:  Default [DF__ms_rule__ruleite__2C3393D0]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_rule] ADD  CONSTRAINT [DF__ms_rule__ruleite__2C3393D0]  DEFAULT ('') FOR [ruleitem]
GO
/****** Object:  Default [DF__ms_rule__ruleico__2D27B809]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_rule] ADD  CONSTRAINT [DF__ms_rule__ruleico__2D27B809]  DEFAULT ('') FOR [ruleicon]
GO
/****** Object:  Default [DF__ms_rule__rulepid__2E1BDC42]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_rule] ADD  CONSTRAINT [DF__ms_rule__rulepid__2E1BDC42]  DEFAULT ((0)) FOR [rulepid]
GO
/****** Object:  Default [DF__ms_rule__ismenu__2F10007B]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_rule] ADD  CONSTRAINT [DF__ms_rule__ismenu__2F10007B]  DEFAULT ('0') FOR [ismenu]
GO
/****** Object:  Default [DF__ms_task__tname__0B91BA14]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_task] ADD  CONSTRAINT [DF__ms_task__tname__0B91BA14]  DEFAULT ('') FOR [tname]
GO
/****** Object:  Default [DF__ms_task__thour__0C85DE4D]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_task] ADD  CONSTRAINT [DF__ms_task__thour__0C85DE4D]  DEFAULT ('') FOR [thour]
GO
/****** Object:  Default [DF__ms_task__tstatus__0E6E26BF]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_task] ADD  CONSTRAINT [DF__ms_task__tstatus__0E6E26BF]  DEFAULT ('not started') FOR [tstatus]
GO
/****** Object:  Default [DF__ms_users__usn__0425A276]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_users] ADD  CONSTRAINT [DF__ms_users__usn__0425A276]  DEFAULT ('') FOR [usn]
GO
/****** Object:  Default [DF__ms_users__pwd__0519C6AF]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_users] ADD  CONSTRAINT [DF__ms_users__pwd__0519C6AF]  DEFAULT ('') FOR [pwd]
GO
/****** Object:  Default [DF__ms_users__avatar__060DEAE8]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_users] ADD  CONSTRAINT [DF__ms_users__avatar__060DEAE8]  DEFAULT ('/Public/Admin/img/profile_small.jpg') FOR [avatar]
GO
/****** Object:  Default [DF__ms_users__email__07020F21]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_users] ADD  CONSTRAINT [DF__ms_users__email__07020F21]  DEFAULT ('') FOR [email]
GO
/****** Object:  Default [DF__ms_users__loginf__07F6335A]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_users] ADD  CONSTRAINT [DF__ms_users__loginf__07F6335A]  DEFAULT ('0') FOR [loginfailure]
GO
/****** Object:  Default [DF__ms_users__logint__08EA5793]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_users] ADD  CONSTRAINT [DF__ms_users__logint__08EA5793]  DEFAULT ('0') FOR [logintime]
GO
/****** Object:  Default [DF__ms_users__create__09DE7BCC]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_users] ADD  CONSTRAINT [DF__ms_users__create__09DE7BCC]  DEFAULT ('0') FOR [createtime]
GO
/****** Object:  Default [DF__ms_users__update__0AD2A005]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_users] ADD  CONSTRAINT [DF__ms_users__update__0AD2A005]  DEFAULT ('0') FOR [updatetime]
GO
/****** Object:  Default [DF__ms_users__token__0BC6C43E]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_users] ADD  CONSTRAINT [DF__ms_users__token__0BC6C43E]  DEFAULT ('') FOR [token]
GO
/****** Object:  Default [DF__ms_users__ustatu__0CBAE877]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_users] ADD  CONSTRAINT [DF__ms_users__ustatu__0CBAE877]  DEFAULT ('normal') FOR [ustatus]
GO
/****** Object:  Default [DF__ms_worker__wname__5070F446]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_workers] ADD  CONSTRAINT [DF__ms_worker__wname__5070F446]  DEFAULT ('') FOR [wname]
GO
/****** Object:  Default [DF__ms_worker__wdepa__5165187F]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_workers] ADD  CONSTRAINT [DF__ms_worker__wdepa__5165187F]  DEFAULT ('') FOR [wdepartment]
GO
/****** Object:  Default [DF__ms_worker__wstat__52593CB8]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_workers] ADD  CONSTRAINT [DF__ms_worker__wstat__52593CB8]  DEFAULT ('normal') FOR [wstatus]
GO
/****** Object:  Default [DF__ms_worker__wlabo__534D60F1]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_workers] ADD  CONSTRAINT [DF__ms_worker__wlabo__534D60F1]  DEFAULT ((8)) FOR [wlaborhours]
GO
/****** Object:  Default [DF__ms_workers__wtel__5441852A]    Script Date: 02/25/2018 21:30:34 ******/
ALTER TABLE [dbo].[ms_workers] ADD  CONSTRAINT [DF__ms_workers__wtel__5441852A]  DEFAULT ((0)) FOR [wtel]
GO
