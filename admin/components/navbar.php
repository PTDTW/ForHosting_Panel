<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php echo ($thisPageName == "dashboard") ? "" : "collapsed"; ?>" href="index.php">
          <i class="bi bi-grid"></i>
          <span>控制面板</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link <?php echo ($thisPageCag == "panelSetting") ? "" : "collapsed"; ?>" data-bs-target="#panel-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>面板管理</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="panel-nav" class="nav-content collapse <?php echo ($thisPageCag == "panelSetting") ? "show" : ""; ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="./panel_baseSetting.php" class="<?php echo ($thisPageCag == "panelSetting" && $thisPageName == "BaseSetting") ? "active" : ""; ?>">
              <i class="bi bi-circle"></i><span>基本管理</span>
            </a>
            <a href="./panel_oauth2Setting.php" class="<?php echo ($thisPageCag == "panelSetting" && $thisPageName == "oauth2Setting") ? "active" : ""; ?>">
              <i class="bi bi-circle"></i><span>第三方登入管理</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo ($thisPageCag == "hostManage") ? "" : "collapsed"; ?>" data-bs-target="#hostManage-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-hdd-network-fill"></i><span>託管管理</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="hostManage-nav" class="nav-content collapse <?php echo ($thisPageCag == "hostManage") ? "show" : ""; ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="#" class="<?php echo ($thisPageCag == "hostManage" && $thisPageName == "planManage") ? "active" : ""; ?>">
              <i class="bi bi-circle"></i><span>方案管理</span>
            </a>
            <a href="#" class="<?php echo ($thisPageCag == "hostManage" && $thisPageName == "storeManage") ? "active" : ""; ?>">
              <i class="bi bi-circle"></i><span>商店管理</span>
            </a>
            <a href="#" class="<?php echo ($thisPageCag == "hostManage" && $thisPageName == "usersList") ? "active" : ""; ?>">
              <i class="bi bi-circle"></i><span>所有用戶</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <li class="nav-item">
        <a class="nav-link <?php echo ($thisPageCag == "pteroManage") ? "" : "collapsed"; ?>" data-bs-target="#pteroManage-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bx-columns"></i><span>翼手龍管理</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pteroManage-nav" class="nav-content collapse <?php echo ($thisPageCag == "pteroManage") ? "show" : ""; ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="#" class="<?php echo ($thisPageCag == "pteroManage" && $thisPageName == "planManage") ? "active" : ""; ?>">
              <i class="bi bi-circle"></i><span>Token金鑰管理</span>
            </a>
            <a href="#" class="<?php echo ($thisPageCag == "pteroManage" && $thisPageName == "storeManage") ? "active" : ""; ?>">
              <i class="bi bi-circle"></i><span>Egg管理</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      <li class="nav-item">
        <a class="nav-link <?php echo ($thisPageCag == "adminManage") ? "" : "collapsed"; ?>" data-bs-target="#adminManage-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-tools"></i><span>管理員管理</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="adminManage-nav" class="nav-content collapse <?php echo ($thisPageCag == "adminManage") ? "show" : ""; ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="#" class="<?php echo ($thisPageCag == "adminManage" && $thisPageName == "planManage") ? "active" : ""; ?>">
              <i class="bi bi-circle"></i><span>管理管理員</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

    </ul>

  </aside><!-- End Sidebar-->