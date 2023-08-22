import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import Ripple from "@wilkr/alpine-ripple";
import Tooltip from "@ryangjchandler/alpine-tooltip";
import money from "alpinejs-money";

Alpine.plugin(collapse);
Alpine.plugin(Ripple);
Alpine.plugin(Tooltip);
Alpine.plugin(money);

window.Alpine = Alpine;
Alpine.start();
