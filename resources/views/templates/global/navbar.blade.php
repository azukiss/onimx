<nav class="links" x-data="currentUrl()">
    <div class="navbar-page" x-data="sidebarLinks()">
        <template x-for="(link,index) in links" :key="index">
            <a x-bind:href="link.route" class="link" x-bind:class="{ 'active': current == link.route }">
                <i x-bind:class="link.icon" class="fa-fw"></i>
                <span x-text="link.title"></span>
            </a>
        </template>
    </div>
    <div class="navbar-tags" x-data="sidebarTags()">
        <template x-for="category in categories" :key="category.id">
            <div class="categories" x-data="{ expanded: (catId === category.id) }">
                <div class="category" x-on:click="expanded = !expanded">
                    <div class="category-title" x-text="category.title"></div>
                    <i x-bind:class="expanded ? 'fa-solid fa-minus' : 'fa-solid fa-chevron-down'"></i>
                </div>
                <div x-show="expanded" x-collapse.duration.500ms>
                    <template x-for="(tag,index) in category.tags" :key="index">
                        <a x-bind:href="tag.route" class="link" x-bind:class="{ 'active': current == tag.route }">
                            <i :class="tag.icon ? tag.icon : 'fa-regular fa-circle fa-fw'"></i>
                            <span x-text="tag.title"></span>
                        </a>
                    </template>
                </div>
            </div>
        </template>
    </div>
</nav>
