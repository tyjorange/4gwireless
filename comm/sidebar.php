<div id="sidebar-left" class="span2" style="white-space: nowrap;">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li><a class="dropmenu" href="#"><i class="icon-eye-open"></i><span
					class="hidden-tablet">运行状态</span></a>
				<ul>
					<li><a class="submenu" href="net_state.php">&emsp;&emsp;<i
							class="icon-signal"></i><span class="hidden-tablet">网络状态</span></a></li>
					<li><a class="submenu" href="pipe_state.php">&emsp;&emsp;<i
							class="icon-sitemap"></i><span class="hidden-tablet">通道状态</span></a></li>
				</ul></li>
			<li><a class="dropmenu" href="#"><i class="icon-dashboard"></i><span
					class="hidden-tablet">系统设置</span></a>
				<ul>
					<li><a class="submenu" href="equi_info.php">&emsp;&emsp;<i
							class="icon-desktop"></i><span class="hidden-tablet">设备信息</span></a></li>
					<li><a class="submenu" href="clientmode.php">&emsp;&emsp;<i
							class="icon-road"></i><span class="hidden-tablet">工作模式</span></a></li>
					<li><a class="submenu" href="if_setting.php">&emsp;&emsp;<i
							class="icon-cogs"></i><span class="hidden-tablet">IF设置</span></a></li>
					<li><a class="submenu" href="snmpconfig.php">&emsp;&emsp;<i
							class="icon-qrcode"></i><span class="hidden-tablet">SNMP设置</span></a></li>
					<!--<li><a class="submenu" href="console_config.php">&emsp;&emsp;<i class="icon-indent-right"></i><span class="hidden-tablet">CONSOLE设置</span></a></li>-->
					<li><a class="submenu" href="apn_config.php">&emsp;&emsp;<i
							class="icon-tags"></i><span class="hidden-tablet">APN设置</span></a></li>
				</ul></li>
			<li><a class="dropmenu" href="#"><i class="icon-list"></i><span
					class="hidden-tablet">通道设置</span></a>
				<ul>
					<li><a class="submenu" href="pipe_filter.php">&emsp;&emsp;<i
							class="icon-random"></i><span class="hidden-tablet">通道及过滤设置</span></a></li>
				</ul></li>
			<li><a class="dropmenu" href="#"><i class="icon-edit"></i><span
					class="hidden-tablet">系统管理</span></a>
				<ul>
					<li><a class="submenu" href="updateconfig.php">&emsp;&emsp;<i
							class="icon-upload-alt"></i><span class="hidden-tablet">系统更新</span></a></li>
					<li><a class="submenu" href="sys_log.php">&emsp;&emsp;<i
							class="icon-book"></i><span class="hidden-tablet">系统日志</span></a></li>
					<li><a class="submenu" href="pswsetting.php">&emsp;&emsp;<i
							class="icon-hospital"></i><span class="hidden-tablet">密码修改</span></a></li>
					<li><a class="submenu" href="#" onclick="recovery()">&emsp;&emsp;<i
							class="icon-reply"></i><span class="hidden-tablet">恢复出厂设置</span></a></li>
					<li><a class="submenu" href="#" onclick="reboot()">&emsp;&emsp;<i
							class="icon-refresh"></i><span class="hidden-tablet">重启系统</span></a></li>
				</ul></li>
		</ul>
	</div>
</div>
<!-- 重启系统 -->
<script type="text/javascript"> function reboot() {if(confirm("重启系统？")){location.href="reboot.php";}}</script>
<!-- 还原设置 -->
<script type="text/javascript"> function recovery() { if(confirm("恢复出厂设置？")) {location.href="recovery.php"; }}</script>
