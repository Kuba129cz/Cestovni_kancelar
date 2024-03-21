<aside class="aside col-3" x-bind:class="{ 'aside--close': open }">
    <a href="#" class="btn btn--primary" @click="open = !open">III</a>
    <ul>
        <li <?php echo ($title === 'Dashboard') ? 'class="active"' : ''; ?>><a href="#">Link 1</a></li>
        <li><a href="#" class="btn btn--primary">click</a></li>
        <li><a href="#" class="btn btn--primary">click</a></li>
        <li><a href="#" class="btn btn--primary">click</a></li>
    </ul>
</aside>