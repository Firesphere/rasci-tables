<td id="$ID-$Subsidiary" class="team $FirstLast
<% if $IsSelected('R', $Subsidiary) %>r<% end_if %>
<% if $IsSelected('A', $Subsidiary) %>a<% end_if %>
<% if $IsSelected('S', $Subsidiary) %>s<% end_if %>
<% if $IsSelected('C', $Subsidiary) %>c<% end_if %>
<% if $IsSelected('I', $Subsidiary) %>i<% end_if %>">
    <% if $CurrentUser.inGroup('administrators') %>
    <select name="rasci-value[]" title="$Title" class="rasci-value">
        $SubsidiaryID
        <option value=""></option>
        <option value="R-$ID-$Subsidiary" <% if $IsSelected('R', $Subsidiary) %>selected="selected"<% end_if %>>
            R
        </option>
        <option value="A-$ID-$Subsidiary" <% if $IsSelected('A', $Subsidiary) %>selected="selected"<% end_if %>>
            A
        </option>
        <option value="S-$ID-$Subsidiary" <% if $IsSelected('S', $Subsidiary) %>selected="selected"<% end_if %>>
            S
        </option>
        <option value="C-$ID-$Subsidiary" <% if $IsSelected('C', $Subsidiary) %>selected="selected"<% end_if %>>
            C
        </option>
        <option value="I-$ID-$Subsidiary" <% if $IsSelected('I', $Subsidiary) %>selected="selected"<% end_if %>>
            I
        </option>
    </select>
    <% else %>
        <% if $IsSelected('R', $Subsidiary) %>R<% end_if %>
        <% if $IsSelected('A', $Subsidiary) %>A<% end_if %>
        <% if $IsSelected('S', $Subsidiary) %>S<% end_if %>
        <% if $IsSelected('C', $Subsidiary) %>C<% end_if %>
        <% if $IsSelected('I', $Subsidiary) %>I<% end_if %>
    <% end_if %>
</td>
